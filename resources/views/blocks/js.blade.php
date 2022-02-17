<script src="/js/bootstrap.bundle.min.js"></script>
<!--Попап картинок в металлографии-->
<script async type="text/javascript">
    document.addEventListener("click", function (e) {
        if (e.target.classList.contains("img-thumbnail")) {
            const src = e.target.getAttribute("src");
            document.querySelector(".modal-img").src = src;
            const alt = e.target.getAttribute("alt");
            document.querySelector(".header-popup").innerText = alt;
            const myModal = new bootstrap.Modal(document.getElementById("metallografy-popup"));
            myModal.show();
        }
    })
</script>
<!--Подсказки (хинты) для свойств материалов-->
<script type="text/javascript">
    var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="hint"]'))
    var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
        return new bootstrap.Popover(popoverTriggerEl)
    })
    var popover = new bootstrap.Popover(document.querySelector('.popover-dismiss'), {
        trigger: 'focus'
    })
</script>
