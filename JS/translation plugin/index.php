<html>

<head>
<link type="text/css" rel="stylesheet" href="./dist/jquery.localizationTool.css">

</head>
<body>
<div id="selectLanguageDropdown"></div>
<div id='local'>تبدأ مع jQuery.localizationTool.js</div>
<script src="//code.jquery.com/jquery-1.11.0.min.js"  type="text/javascript"></script>
<script src="./src/jquery.localizationTool.js"  type="text/javascript"></script>

<script>
            $('#selectLanguageDropdown').localizationTool({
                'defaultLanguage' : 'ar_TN', /* (optional) although must be defined if you don't want en_GB */
                'showFlag': false,            /* (optional) show/hide the flag */
                'showCountry': false,         /* (optional) show/hide the country name */
                'showLanguage': true,        /* (optional) show/hide the country language */
                
                /* 
                 * Translate your strings below
                 */
                'strings' : {
                   
                    /*
                     * Example with id. NOTE: ids have priority over any other
                     * selector in the translation.
                     */
                    'تبدأ مع jQuery.localizationTool.js' : {
                        'en_GB' : 'dddddd'
                    }
                }
            });
            // end of step-by-step guide
        </script>
</html>