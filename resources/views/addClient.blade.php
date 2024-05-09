<!DOCTYPE html>
<html>
<body>

<h2>Insert Client</h2>

<form action="{{ route('insertClient')}}" method="POST">
    @csrf
  <label for="clientName">Client Name:</label><br>
  <input type="text" id="clientName" name="clientName" value="John"><br>
  <label for="phone">Phone:</label><br>
  <input type="text" id="phone" name="phone" value="Doe"><br><br>
  <label for="email">Email:</label><br>
  <input type="text" id="email" name="email" value="Doe"><br><br>
  <label for="website">website</label><br>
  <input type="text" id="website" name="website" value="Doe"><br><br>
  <input type="submit" value="Submit">
</form> 

<p>If you click the "Submit" button, the form-data will be sent to a page called "/action_page.php".</p>

</body>
</html>