<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>403 Error Page</title>
    <link href="{{asset("css/ErrorPgstyle.css")}}" rel="stylesheet">
  </head>
  <body>
    <div class="error_page">
      <h2>Oops! Forbidden.</h2>
      <h1>403</h1>
      <p>You don't have permission to access.</p>
      <a href="/dashboard">Go back</a>
    </div>
  </body>
</html>
