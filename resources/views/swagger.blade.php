<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>API Documentation</title>
    <link href="{{asset('vendor/swagger-ui/swagger-ui.css')}}" rel="stylesheet">
</head>
<body>
<div id="swagger-ui"></div>
<script src="{{asset('vendor/swagger-ui/swagger-ui-bundle.js')}}"></script>
<script src="{{asset('vendor/swagger-ui/swagger-ui-standalone-preset.js')}}"></script>
<script>
    window.onload = function () {
        // Begin Swagger UI call region
        const ui = SwaggerUIBundle({
            url: "{{ url('/api/documentation/swagger.json') }}",
            dom_id: '#swagger-ui',
            deepLinking: true,
            presets: [
                SwaggerUIBundle.presets.apis,
                SwaggerUIStandalonePreset
            ],
            plugins: [
                SwaggerUIBundle.plugins.DownloadUrl
            ],
            layout: "BaseLayout"
        })
        // End Swagger UI call region

        window.ui = ui
    }
</script>
</body>
</html>
