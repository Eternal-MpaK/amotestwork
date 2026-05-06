<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Тестовое задание №2</title>
        <script src="https://code.jquery.com/jquery-1.8.3.js"></script>
    </head>
    <body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col">
        <header class="w-full lg:max-w-4xl max-w-[335px] text-sm mb-6 not-has-[nav]:hidden">

        </header>
        <div class="external-content">
            {!! $content !!}
        </div>
    </body>
    <script>
        $(document).ready(function() {
            let inputs = $("input")
            inputs.parent().hide()
            $('[name="type_val"]').change(function () {
                let currentValue = $(this).val()

                switch (currentValue) {
                    case '1':
                        inputs.parent().hide()
                        $('[name*="1"]').parent().show()
                        break
                    case '2':
                        inputs.parent().hide()
                        $('[name*="2"]').parent().show()
                        break
                    case '3':
                        inputs.parent().hide()
                        $('[name*="3"]').parent().show()
                        break
                    case '4':
                        inputs.parent().hide()
                        $('[name*="4"]').parent().show()
                        break
                    case '5':
                        inputs.parent().hide()
                        $('[name*="5"]').parent().show()
                        break
                }
            })
        })
    </script>
</html>
