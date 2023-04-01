<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>404 Error Page</title>
    <link href="{{asset("css/ErrorPgstyle.css")}}" rel="stylesheet">
  </head>
  <body>
    <div class="error_page">
      <h2>Oops! Internal Server Error.</h2>
      <h1>500</h1>
      <p>the server encountered an unexpected condition that prevented it from fulfilling the request.</p>
      <a href="/dashboard">Go back</a>
    </div>
  </body>
</html>
