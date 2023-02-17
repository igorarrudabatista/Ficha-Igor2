<!DOCTYPE html>
<html>

  <head>
    <base target="_top">
        <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

  </head>

  <body>
    <div class="container" >
        <div class=''>
          <h3 class="text-white bg-secondary p-3 rounded"> Recuperação de senha</h3>
            
            <div class="form-group">
            <label for="inputName">Primeiro nome </label>
            <input type="text" class="form-control" id="inputName" required  placeholder="Primeiro nome">
            </div>

            <div class="form-group">
            <label for="inputCode">Código de aluno </label>
            <input type="text" class="form-control" id="inputCode" required  placeholder="Apenas números">
            </div>

            <div class="form-group">
            <label for="inputMotherName">Nome completo do responsável</label>
            <input type="text" class="form-control" id="inputMotherName" required placeholder="Nome completo do seu responsável">
            </div>


            <div class="form-group">
            <label for="birthDay">Data de nascimento</label>
            <input type="date" required class="form-control" id="birthDay">
            </div>

            <div>
              <button type="button" id='startClick' style='float:left;'  class="btn btn-primary">Verificar conta</button>
              &nbsp;
              <button type="button" id='changePass' style='float:left;'  class="btn btn-warning">Gerar nova senha</button>

              <div id ="output" class="">
                
              </div>

            </div>

        </div>
    </div>
  <script>

      var action = document.getElementById('startClick');
      action.addEventListener('click',start);
      
      var changePass = document.getElementById('changePass');
      changePass.addEventListener('click',startChange);
      
      function start()
      {
          if(action)
          {
            google.script.run.withSuccessHandler(onSuccess)
            .validStudent(
                "verify",
                document.getElementById('inputName').value,
                document.getElementById('inputCode').value,
                document.getElementById('inputMotherName').value,
                document.getElementById('birthDay').value
        //    document.getElementById('inputMatricula').value
            );  

            function onSuccess(result) 
            {
              var div = document.getElementById('output');
              div.innerHTML = result;
            }
          }
      }
        
      function startChange()
      {
        if(changePass)
        {
          google.script.run.withSuccessHandler(onSuccess)
          .validStudent(
              "changePass",
              document.getElementById('inputName').value,
              document.getElementById('inputCode').value,
              document.getElementById('inputMotherName').value,
              document.getElementById('birthDay').value
          );  

            function onSuccess(result) 
            {
              var div = document.getElementById('output');
              div.innerHTML = result;
            }
        }
      }
  </script>      
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

    </body>
</html>


