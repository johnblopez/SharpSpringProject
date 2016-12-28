<?php
  include("header.php");
?>

	  <form action="dashboard.php" method="post">
        <table>
          <tr>
          	<td class="table-form">User Name: </td><td class="table-form"><input type="text" name="username" /></td>
          </tr>
          <tr>
          	<td class="table-form">Password: </td><td class="table-form"> <input type="password" name="password" /></td>
          </tr>
          <tr>
          	<td class="table-form" colspan="2"><button type="submit" value="Submit" id="login-button"  class="btn btn-primary">Submit</button></td>
          </tr>
        </table>
      </form> 

<?php
  include("footer.php");
?>
