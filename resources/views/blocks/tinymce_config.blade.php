<script type="text/javascript">
    tinymce.init({
        selector: "textarea",
        custom_undo_redo_levels: 20,
        // force_br_newlines: false,
        force_p_newlines: true,
        forced_root_block: "",
        entity_encoding: 'raw',
        table_style_by_css: false,
        table_default_styles: {},
        table_default_attributes: {},
        invalid_styles: 'width height',
        verify_html:false,
        table_sizing_mode: 'relative',
        table_class_list: [
            {title:'Простая таблица', value:'table table-striped align-middle'},
            {title:'Таблица с границами', value:'table table-bordered table-striped align-middle'}
        ],
        menubar: false,
        plugins: "link media image code table lists wordcount charmap fullscreen preview pagebreak",
        toolbar: "undo redo | code | styleselect fontsizeselect | superscript subscript forecolor removeformat pagebreak |table charmap | bold italic numlist bullist | outdent indent | link image media | alignleft aligncenter alignright alignjustify | preview fullscreen| wordcount",
        image_dimensions: false,
        image_class_list: [
            {title: 'Адаптив для мобильных', value: 'img-fluid'},
        ],
        file_picker_callback: elFinderBrowser
    });

    function elFinderBrowser (callback, value, meta) {
        tinymce.activeEditor.windowManager.openUrl({
            title: 'File Manager',
            url: '{{ route('elfinder.tinymce5') }}',
            /**
             * On message will be triggered by the child window
             *
             * @param dialogApi
             * @param details
             * @see https://www.tiny.cloud/docs/ui-components/urldialog/#configurationoptions
             */
            onMessage: function (dialogApi, details) {
                if (details.mceAction === 'fileSelected') {
                    const file = details.data.file;

                    // Make file info
                    const info = file.name;

                    // Provide file and text for the link dialog
                    if (meta.filetype === 'file') {
                        callback(file.url, {text: info, title: info});
                    }

                    // Provide image and alt text for the image dialog
                    if (meta.filetype === 'image') {
                        callback(file.url, {alt: info});
                    }

                    // Provide alternative source and posted for the media dialog
                    if (meta.filetype === 'media') {
                        callback(file.url);
                    }

                    dialogApi.close();
                }
            }
        });
    }


</script>
