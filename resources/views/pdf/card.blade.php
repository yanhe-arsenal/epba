<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>ePBA Card</title>
    {!! Html::style('assets/css/pdf.css') !!} 	 
</head>
  <body>
 
    <main>
      <div id="details" class="clearfix">
        <div id="invoice">
          <h1>ePBA Card</h1>
          <div class="ID">Card ID: {{ $data['card_id'] }}</div>
          <div class="date">Issue Time: {{ $data['issue_time'] }}</div>
        </div>
      </div>
      <table border="0" cellspacing="0" cellpadding="0">
        <thead>
          <tr>
            <th class="first_name">First Name</th>
            <th class="last_name">Last Name</th>
            <th class="email">Email</th>
            <th class="phone">Phone Number</th>
            <th class="birthday">Birthday</th>
            <th class="address">Home Address</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="first_name">{{ $data['first_name'] }}</td>
            <td class="last_name">{{ $data['last_name'] }}</td>
            <td class="email">{{ $data['email'] }}</td>
            <td class="phone">{{ $data['phone'] }} </td>
            <td class="birthday">{{ $data['birthday'] }} </td>
            <td class="address">{{ $data['address'] }} </td>
          </tr>
 
        </tbody>
      </table>
  </body>
</html>
