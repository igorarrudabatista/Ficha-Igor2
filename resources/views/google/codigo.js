function doGet() {
  return HtmlService.createTemplateFromFile('index').evaluate().setSandboxMode(HtmlService.SandboxMode.IFRAME);
}
function include(filename) {
  return HtmlService.createHtmlOutputFromFile(filename)
    .getContent();
}

function validStudent(token, inputName, inputCode, inputMotherName, birthDay) {
  var regex = new RegExp(/\s+/g);
  motherName = inputMotherName.toUpperCase().trim().replace(regex, '+');
  studentName = inputName.toUpperCase().trim();
  
  try {

    if (studentName && motherName && birthDay) {
      var regexPrepositions = new RegExp(/\b(DA|DAS|DE|DI|DO|DOS|DU)\b/g);
      studentNameCleaned = studentName.replace(regexPrepositions, ' ')
      studentNameCleaned = studentNameCleaned.replace(regex, '+');
      
      var results = AdminDirectory.Users.list({
        customer: 'my_customer',
        query: "name:" + studentNameCleaned + " externalId=" + inputCode + " orgDepartment=" + birthDay + " orgCostCenter=" + motherName
      });


      var dia = birthDay.slice(8);
      var mes = birthDay.slice(5, birthDay.lastIndexOf('-'));
      var ano = birthDay.slice(0, 4);

      var mensagem = "<br><br><br>";
      mensagem += "<div class='card'>";
      mensagem += "<h5 class='card-header text-white bg-success'> Conta verificada com sucesso</h5>";

      mensagem += "<div class='card-body'>";
      mensagem += "<h5>Anota seu e-mail:</h5>";
      mensagem += "<p class='card-text '>" + results.users[0].primaryEmail + "</p>"


      if (token == "changePass") {

        try {
          var senha = "mt21" + birthDay.replace('-', '').replace('-', '').replace('-', '').replace('-', '')
          var email = results.users[0].primaryEmail;
          var changing = AdminDirectory.Users.update({ "password": senha, "changePasswordAtNextLogin": true }, email)

          mensagem += "<hr>";
          mensagem += "<h5 class='card-title'>Anota sua senha provisária</h5>";
          mensagem += "<p class='card-text'>" + senha + "</p>";
          mensagem += "<a target='_blank' href='https://classroom.google.com' class='btn btn-success'>"
          mensagem += "Clique para entrar na sua conta";
          mensagem += "</a>";
          mensagem += "</div>";
          mensagem += "</div>";


          return mensagem;

        } catch (er) {
          return "Erro criar sua nova senha, verifique se colocou todos os dados corretamente<br>"
        }

      } else if (token == "verify") {
        var lastLogin = new Date(results.users[0].lastLoginTime).getTime();

        if (lastLogin > 0) {
          mensagem += "<b>Idenficamos que você já logou na sua conta, se não lembra a senha, clique em gerar nova senha!:</b><br>";
        }

        mensagem += "<a target='_blank' href='https://classroom.google.com' class='btn btn-success'>"
        mensagem += "Clique para entrar na sua conta";
        mensagem += "</a>";
        mensagem += "</div>";
        mensagem += "</div>";
        return mensagem + "<br>";

      }

    } else {
      var mensagemerro = "<br><br><br>";
      mensagemerro += "<div class='alert alert-danger' role='alert'>"
      mensagemerro += "Erro na validação dos dados, verifique se colocou todos os dados corretamente."
      mensagemerro += "</div>"
      return mensagemerro

    }
  } catch (e) {
    //    Logger.log(e);
    var mensagemerro = "<br><br><br>";
    mensagemerro += "<div class='alert alert-danger' role='alert'>"
    mensagemerro += "Erro ao localizar sua conta, verifique se colocou todos os dados corretamente<br>"
    mensagemerro += "</div>"
    return mensagemerro
  }
}
