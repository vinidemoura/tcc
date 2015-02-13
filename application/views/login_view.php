<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
   <title>Simple Login with CodeIgniter</title>
 </head>
 <body>
   <h1>Simple Login with CodeIgniter</h1>
   <?php echo validation_errors(); ?>
   <?php echo form_open('verificarlogin'); ?>
     <label for="login">Usuario:</label>
     <input type="text" size="20" id="login" name="login"/>
     <br/>
     <label for="senha">Senha:</label>
     <input type="password" size="20" id="senha" name="senha"/>
     <br/>
     <input type="submit" value="Login"/>
   </form>
 </body>
</html>