<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fullstack php/bootstrap/js</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="/images/icons8-php-48.png">
    <link rel="stylesheet" href="/estilo.css">
  </head>
<body class="bs-white"> 

    <?php
        if(isset($_POST['acao']))
        {
            //form foi enviado?

            //Se sim, validamos
            $nome = strip_tags($_POST['nome']);
            $sobrenome = strip_tags($_POST['sobrenome']);
            $endereco = ($_POST['endereco']);
            $CPF = ($_POST['CPF']);
    
            function validaCPF($CPF) {

              // Extrai somente os números
              $cpf = preg_replace( '/[^0-9]/is', '', $CPF);
          
              // Verifica se foi informado todos os digitos corretamente
              if (strlen($CPF) != 11) {
                  return false;
              }
          
              // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
              if (preg_match('/(\d)\1{10}/', $CPF)) {
                  return false;
              }
          
              // Faz o calculo para validar o CPF
              for ($t = 9; $t < 11; $t++) {
                  for ($d = 0, $c = 0; $c < $t; $c++) {
                      $d += $CPF[$c] * (($t + 1) - $c);
                  }
                  $d = ((10 * $d) % 11) % 10;
                  if ($CPF[$c] != $d) {
                      return false;
                  }
              }
              return true;
          
          }

        if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) == false)
        {

        }
        
           else
           {
            $email = $_POST['email'];
            //vai passar a validação para o banco de dados
            $pdo = new PDO('mysql:host=localhost;dbname=fullstack-cadastramento', 'root');
            $sql = $pdo->prepare("INSERT INTO clientes VALUES(?,?,?,?,?)");
            $sql->execute(array($nome,$sobrenome,$email,$endereco,$CPF));
            }
            
        } 
    ?>

<div class="container">
  <main>
    <div class="py-5 text-center" class="div-text">
      <img class="d-block mx-auto mb-4" src="/images/logo.png" alt="" width="180" height="180">
      <h2>Cadastre-se</h2>
      <p class="lead">Cadastre-se na melhor plataforma de ecommerce da América latina e comece<br> a vender seus produtos globalmente agora mesmo.</p>
    </div>

      <div class="col-md-12">
        <h4 class="mb-3">Preencha seus dados</h4>
        <form class="needs-validation" method="post">
          <div class="row g-3">
            <div class="col-sm-6">
              <label for="firstName" class="form-label">Nome * </label>
              <input type="text" class="form-control" id="firstName" placeholder="" value="" name="nome">
              <div class="invalid-feedback">
                Valid first name is required.
              </div>
            </div>

            <div class="col-sm-6">
              <label for="lastName" class="form-label">Sobrenome *</label>
              <input type="text" class="form-control" id="lastName" placeholder="" value="" name="sobrenome">
              <div class="invalid-feedback" >
                Digite um sobrenome válido
              </div>
            </div>


            <div class="col-12">
              <label for="email" class="form-label">Email <span class="text-muted">(Opcional)</span></label>
              <input type="text" class="form-control" id="email" placeholder="Digite seu email" name="email" required>
              <div class="invalid-feedback">
                Ensira um email valido
              </div>
            </div>

            <div class="col-12">
              <label for="address" class="form-label">Endereço</label>
              <input type="text" class="form-control" id="address" placeholder="Rua 201, bairro..." name="endereco" required>
              <div class="invalid-feedback">
                Coloque um endereço válido
              </div>
            </div>

            <div class="col-12">
              <label for="address2" class="form-label">Endereço 2 <span class="text-muted">(Optional)</span></label >
              <input type="text" class="form-control" id="address2" placeholder="Ap 101...">
            </div>

            <div class="col-md-5">
              <label for="country" class="form-label">País</label>
              <select class="form-select" id="country" name="pais">
                <option value="">Selecionar...</option>
                <option>Albania</option>
               <option> Algeria</option>
                <option>Andorra</option>
                <option>Angola</option>
                <option>Antigua & Deps</option>
               <option> Argentina</option>
               <option> Armenia</option>
                <option>Australia</option>
                <option>Austria</option>
               <option> Azerbaijan</option>
                <option>Bahamas</option>
                <option>Bahrain</option>
                <option>Bangladesh</option>
                <option>Barbados</option>
                <option>Belarus</option>
                <option>Belgium</option>
                <option>Belize</option>
               <option> Benin</option>
                <option>Bhutan</option>
                <option>Bolivia</option>
                <option>Bosnia Herzegovina</option>
                <option>Botswana</option>
                <option>Brazil</option>
                <option>Brunei</option>
                <option>Bulgaria</option>
                <option>Burkina</option>
                <option>Burundi</option>
               <option> Cambodia</option>
               <option> Cameroon</option>
                <option>Canada</option>
                Cape Verde
                Central African Rep
                Chad
                Chile
                China
                Colombia
                Comoros
                Congo
                Congo {Democratic Rep}
              <option>Costa Rica</option>
                Croati
                <option>Cuba</option>
                <option>Cyprus</option>
               <option> Czech Republic</option>
                <option>Denmark</option>
                <option>Djibouti</option>
                <option>Dominica</option>
               <option> Dominican Republic</option>
                <option>East Timor</option>
                <option>Ecuador</option>
                <option>Egypt</option>
                <option>El Salvador</option>
                <option>Equatorial Guinea</option>
               <option> Eritrea</option>
               <option> Estonia</option>
                <option>Ethiopia</option>
                <option>Fiji</option>
                <option>Finland</option>
                <option>France</option>
                <option>Gabon</option>
                <option>Gambia</option>
                <option>Georgia</option>
                <option>Germany</option>
                <option>Ghana</option>
                <option>Greece</option>
                <option>Grenada</option>
                <option>Guatemala</option>
                <option>Guinea</option>
                Guinea-Bissau
                Guyana
                <option>Haiti</option>
                Honduras
                Hungary
                Iceland
                India
                Indonesia
                Iran
                Iraq
                Ireland {Republic}
                Israel
                Italy
                Ivory Coast
                Jamaica
                Japan
                Jordan
                Kazakhstan
                Kenya
                Kiribati
                Korea North
                <option>Korea South</option>
                Kosovo
                Kuwait
                Kyrgyzstan
                Laos
                Latvia
                Lebanon
                Lesotho
                Liberia
                Libya
                Liechtenstein
                Lithuania
                Luxembourg
                Macedonia
                Madagascar
                Malawi
                Malaysia
                Maldives
                Mali
                Malta
                Marshall Islands
                Mauritania
                Mauritius
                <option>Mexico</option>
                <option>Micronesia</option>
                <option>Moldova</option>
                <option>Monaco</option>
                Mongolia
                <option>Montenegro</option>
                Morocco
                <option>Mozambique</option>
                <option>Myanmar, {Burma}</option>
               <option> Namibia</option>
                <option>Nauru</option>
                <option>Netherlands</option>
                <option>New Zealand</option>
                Niger
                Nigeria
                Norway
                Oman
                Pakistan
                Palau
                Panama
                Papua New Guinea
                Paraguay
                Peru
                Philippines
                Poland
                Portugal
                Qatar
                Romania
                Russian Federation
                Rwanda
                St Kitts & Nevis
                St Lucia
                Saint Vincent & the Grenadines
                Samoa
                San Marino
                Sao Tome & Principe
                Saudi Arabia
                Senegal
                Serbia
                Seychelles
                Sierra Leone
                Singapore
                Slovakia
                Slovenia
                Solomon Islands
                Somalia
                South Africa
                South Sudan
                Spain
                Sri Lanka
                Sudan
                <option>Suriname</option>
                <option>Swaziland</option>
                <option>Sweden</option>
                <option>Switzerland</option>
                <option>Syria</option>
                <option>Taiwan</option>
                <option>Tajikistan</option>
                Tanzania
                <option>Thailand</option>
                Togo
                <option>Tonga</option>
                <option>Trinidad & Tobago</option>
               <option> Tunisia</option>
                <option>Turkey</option>
                <option>Turkmenistan</option>
                <option>Tuvalu</option>
                <option>Uganda</option>
                Ukraine
                <option>United Arab Emirates</option>
                <option>United Kingdom</option>
                <option>United States</option>
                <option>Uruguay</option>
                <option>Uzbekistan</option>
                Vanuatu
                <option>Vatican City</option>
                Venezuela
                Vietnam
                Yemen
                Zambia
                Zimbabwe

              </select>
              <div class="invalid-feedback">
                Please select a valid country.
              </div>
            </div>

            <div class="col-md-4">
              <label for="state" class="form-label">Estado</label>
              <select class="form-select" id="state">
                <option value="">Selecionar...</option>
                <option>California</option>
              </select>
              <div class="invalid-feedback">
                Por favor, Selecione um estado válido
              </div>
            </div>

            <div class="col-md-3">
              <label for="zip" class="form-label">CPF*</label>
              <input type="text" class="form-control" id="zip" placeholder="Ex: 00000-000" name="CPF">
              <div class="invalid-feedback">
                Digite um CPF válido
              </div>
            </div>
          </div>

          <hr class="my-4">

          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="same-address">
            <label class="form-check-label" for="same-address">Manter-me conectado</label>
          </div>

          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="save-info">
            <label class="form-check-label" for="save-info">Salvar informações</label>
          </div>

          <hr class="my-4">


          <button class="w-100 btn btn-primary btn-lg" type="submit" name="acao">Cadastrar</button>
        </form>
      </div>
    </div>
  </main>

  <footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">&copy; Nome do cliente - 2022</p>
    <ul class="list-inline">
      <li class="list-inline-item"><a href="#">Privacidade</a></li>
      <li class="list-inline-item"><a href="#">Termos de uso</a></li>
      <li class="list-inline-item"><a href="#">Suporte</a></li>
    </ul>
  </footer>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <script src="/js/botao-alerta.js"></script>
  </body>
</html>