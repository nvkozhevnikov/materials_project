import re
from bs4 import BeautifulSoup
import requests
from datetime import date, datetime
import random
import xml.etree.ElementTree as et
import mysql_queries
import config

def get_headers_proxy():
    users = config.USER_AGENTS_PROXY_LIST
    user = random.choice(users)
    headers = {'user-agent': user['user-agent']}
    proxy_dict = {'http': user['http_proxy']}
    persona = {
        'headers': headers,
        'proxy_dict': proxy_dict
    }
    return persona

def get_page():
    user = get_headers_proxy()
    r = requests.get('https://markets.businessinsider.com/commodities', headers=user['headers'], proxies=user['proxy_dict'], timeout=5)
    return r.text

def get_usd_price():
    user = get_headers_proxy()
    url = f"https://cbr.ru/scripts/XML_daily.asp?date_req={date.today().strftime('%d/%m/%Y')}"
    r = requests.get(url, headers=user['headers'],
                     proxies=user['proxy_dict'], timeout=5)

    p = et.fromstring(r.text)
    i = 0
    for x in p:
        if p[i].attrib['ID'] == 'R01235':
            for child in p[i]:
                if child.tag == 'Value':
                    usd = child.text.strip()
        i += 1
    return usd



def find_data(data):
    soup = BeautifulSoup(data, "html.parser")

    gold = soup.find_all("tr", {"onclick": re.compile('gold-price')})
    palladium = soup.find_all("tr", {"onclick": re.compile('palladium-price')})
    platinum = soup.find_all("tr", {"onclick": re.compile('platinum-price')})
    silver = soup.find_all("tr", {"onclick": re.compile('silver-price')})
    aluminum = soup.find_all("tr", {"onclick": re.compile('aluminum-price')})
    lead = soup.find_all("tr", {"onclick": re.compile('lead-price')})
    iron_ore = soup.find_all("tr", {"onclick": re.compile('iron-ore-price')})
    copper = soup.find_all("tr", {"onclick": re.compile('copper-price')})
    nickel = soup.find_all("tr", {"onclick": re.compile('nickel-price')})
    zinc = soup.find_all("tr", {"onclick": re.compile('zinc-price')})
    tin = soup.find_all("tr", {"onclick": re.compile('tin-price')})
    uranium = soup.find_all("tr", {"onclick": re.compile('uranium-price')})

    metals = {
        'gold': gold,
        'palladium': palladium,
        'platinum': platinum,
        'silver': silver,
        'aluminum': aluminum,
        'lead': lead,
        'iron_ore': iron_ore,
        'copper': copper,
        'nickel': nickel,
        'zinc': zinc,
        'tin': tin,
        'uranium': uranium,
        }
    return metals

def prepare_data(data):

    for name, value in data.items():
        for td in value:
            price = td.find_all('td')[1].text.replace(',','').strip()
            percent = td.find_all('td')[2].text.replace('%','')
            chng_adsolut = td.find_all('td')[3].text
            unit = td.find_all('td')[4].text.strip()

            metals_list = {
                'gold': 'Золото',
                'palladium': 'Палладий',
                'platinum': 'Платина',
                'silver': 'Серебро',
                'aluminum': 'Алюминий',
                'lead': 'Свинец',
                'iron_ore': 'Железная руда',
                'copper': 'Медь',
                'nickel': 'Никель',
                'zinc': 'Цинк',
                'tin': 'Олово',
                'uranium': 'Уран',
            }

            unit_list = {
                'USD per Troy Ounce': "USD за тройскую инцию",
                'USD per Ton': "USD за тонну",
                'per 250 Pfund U308': 'USD за 125 кг U308',
                'per Dry Metric Ton': "USD за сухую тонну",
            }

            payload = {
                    'metal_name': metals_list[name],
                    'price': price,
                    'chng_percents': percent,
                    'chng_absolut': chng_adsolut,
                    'unit': unit_list[unit],
                    'date': datetime.now(),
                }
            send_data_to_db(payload)


def send_data_to_db(data):
    db = mysql_queries.MySQLQueries(**config.DB_MTRLS_PARAMS)
    query = f"UPDATE metal_prices " \
            f"SET price = '{data['price']}', " \
            f"chng_percents = '{data['chng_percents']}', chng_absolut = '{data['chng_absolut']}', " \
            f"unit = '{data['unit']}', date = '{data['date']}' " \
            f"WHERE metal_name = '{data['metal_name']}'"
    db.mysql_update(query)

def send_usd_to_db(usd):
    db = mysql_queries.MySQLQueries(**config.DB_MTRLS_PARAMS)
    query = f"UPDATE currency_prices " \
            f"SET price = '{usd.replace(',','.')}', date = '{date.today()}'" \
            f"WHERE currency_id = 1"
    db.mysql_update(query)

def main():
    usd = get_usd_price()
    prepare_data(find_data(get_page()))
    send_usd_to_db(usd)


if __name__ == '__main__':
    main()


