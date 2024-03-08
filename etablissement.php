<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecole Supérieure de Technologie Dakhla</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/carousel/">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.css">

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link href="./Css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="Css/stileCours.css">
    <style>
        /* Réutilisation du CSS précédent */
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f5ff; /* Bleu clair */
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #007bff; /* Bleu */
            color: white;
            padding: 20px 0;
            text-align: center;
        }
       
        .description {
            text-align: justify;
            margin-bottom: 20px;
        }
        .image-container {
            margin-top: 20px;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }
        .image-container img {
            max-width: 30%;
            margin-bottom: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        /* Styles de la table */
        .table {
            width: 100%;
            margin-bottom: 1rem;
            color: #212529;
            border-collapse: collapse;
            font-size: 0.9rem; /* Réduction de la taille du texte */
        }

        .table th,
        .table td {
            padding: 0.5rem;
            vertical-align: top;
            border-top: 1px solid #dee2e6;
        }

        .table thead th {
            vertical-align: bottom;
            border-bottom: 2px solid #dee2e6;
        }

        .table-bordered {
            border: 1px solid #dee2e6;
        }

        .table-bordered th,
        .table-bordered td {
            border: 1px solid #dee2e6;
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: rgba(0, 0, 0, 0.05);
        }

        .table-hover tbody tr:hover {
            background-color: rgba(0, 0, 0, 0.075);
        }

        .table thead th,
        .table tbody td {
            padding: 0.7rem;
            text-align: center;
        }

        .table thead th {
            background-color: #007bff;
            color: white;
        }

        .table tbody tr:nth-of-type(odd) {
            background-color: #f8f9fa;
        }

        /* Couleurs personnalisées pour le titre */
        .title-text {
            color: #333; /* Couleur de texte plus sobre */
            font-size: 2rem; /* Taille de police légèrement augmentée */
            font-family: 'Arial Black', sans-serif;
            margin-bottom: 30px;
            text-align: center;
        }
        .title-text span {
            color: #dc3545;
        }
        .title-text span:last-child {
            color: #28a745;
        }
    </style>
</head>
<body>
<header>
   <?php
      require 'header/header.php';
     ?>
</header>
<main>
    <section id="formations">
       
    </section>
    
   
    <div class="container">
        
        <div class="row">
            <div class="col-md-12">
                
                <div class="image-container">
                    <?php
                    $image_paths = [ "Img/e2.jpg", "Img/e3.jpg", "Img/e4.jpg", "Img/e5.jpg"];
                    foreach ($image_paths as $image_path) {
                        echo "<img src='$image_path' alt='Image de l'établissement'>";
                    }
                    ?>
                </div>
            </div>
            <div class="col-md-12">
                <h3>Description</h3>
                <p class="description">Distinguée par sa singularité à vocation professionnelle,
                    l'ESTD vise, en premier lieu, à former des profils aptes à s'intégrer dans le tissu économique
                    régional et national, en raffinant des compétences capables d'assurer des responsabilités
                    intermédiaires au sein des diverses unités industrielles et économiques.<br><br>

                    L’EST Dakhla met également l’accent sur les compétences transversales telles que
                    les sciences humaines et sociales, la communication, la gestion et l’informatique.
                    Les étudiants ont accès à des dispositifs tels que des projets,
                    des stages et des travaux pratiques pour compléter leur apprentissage.<br><br>
                    
                    Distinguée par sa singularité à vocation professionnelle, l’ESTD vise, en premier lieu, à former des profils aptes à s’intégrer dans le tissu économique régional et national, en raffinant des compétences capables d’assurer des responsabilités intermédiaires au sein des diverses unités industrielles et économiques. Une mission qui impose à l’ESTD d’avoir des rapports étroits avec son contexte socioéconomique en développant des pratiques pédagogiques impactant l’intégration et l’employabilité des lauréats.<br><br>

                    Principalement, la formation initiale de l’ESTD est une formation de courte durée Bac+2 et est sanctionnée par le Diplôme Universitaire de Technologie (DUT). En outre, dans une perspective de satisfaire le besoin territorial et régional, cet établissement à vocation technologique offrira des licences professionnelles dans des spécialités porteuses dans le marché du travail.<br><br>

                    À l’instar des autres ESTs, le système pédagogique de l’Ecole Supérieure de Technologies-Dakhla présente des particularités telles que :<br>
                    - Un système modulaire, semestriel et d’enseignement par petits groupes ;<br>
                    - Des formations en adéquation avec les besoins du marché de l’emploi ;<br>
                    - Une sélection des bacheliers centralisée par la plateforme Tawjihi ;<br>
                    - Un recrutement à l’échelle nationale.<br><br>

                    À finalités professionnalisantes et de technicité, les offres pédagogiques de l’ESTD sont conçues pour développer chez l’apprenant, l’esprit d’initiative, de travail en équipe et de prise de contact progressive avec le milieu professionnel. Par conséquent, la pédagogie adoptée se complète par les divers dispositifs de mises en situation, à savoir projets, stages, travaux pratiques, enquêtes, …etc. Les filières dispensées sont pluridisciplinaires et accompagnées par des stages et des formations en soft skills compte tenu l’ouverture en sciences humaines et sociales, en langues et communication, en gestion et en informatique.<br><br>

                    À la fin de son cursus, et avec tous ces atouts, l’étudiant /futur lauréat acquiert des compétences professionnelles et des aptitudes personnelles qui lui permettent de s’insérer facilement dans le marché de l’emploi et de s’adapter constamment à ses évolutions.
                </p>
            </div>
        </div>
    </div>
    <div id="contenidoAdicional" style="display: none;">
    <section id="mission">
    <div class="container">
        <h2>Mission de l'EST de Dakhla</h2>
        <p>L’EST de Dakhla est un établissement d’Enseignement Supérieur relevant de l’Université Ibn Zohr. Elle a pour mission la formation des cadres intermédiaires dans différents domaines technologiques pour le développement des entreprises marocaines. En effet, la mutation sociale et économique au Maroc passe principalement par l’émergence de la société de la connaissance. En vue de maintenir et d’entretenir les postulats sur lesquels sont fondées les réformes actuelles de l’enseignement supérieur, aujourd’hui, les acteurs et les parties prenantes supportent davantage la relation de cause à effet : ‘la connaissance favorise la croissance’. Les liens savoirs et compétitivité, savoirs et innovation, savoirs et bien-être des individus, notamment de la société, s’imposent comme une nécessité partagée par tous les intervenants du secteur.</p>
        <p>En dépit de son rôle classique comme espace propice de formation, l’EST de Dakhla vise à remplir de nouvelles missions dans les différentes dimensions de la vie des étudiants, en matière d’éducation sociale et du développement humain.</p>
        <p>Dans cette sperspective, et même s’il découle d’une vision évolutive à objectifs réalistes et réalisables, notre mission repose principalement sur l’opérationnalisation de la notion de l’innovation, à savoir innover pour proposer des :</p>
        <ol>
            <li>Favoriser l’offre de formation par un caractère professionnalisant dans la région Dakhla-Oued Eddahab.</li>
            <li>Doter la région du sud du Maroc des nouvelles disciplines territoriales en tenant par considération les aspects économiques et la richesse interculturelle.</li>
            <li>Instaurer une administration smart, digitale et performante.</li>
            <li>Se positionner dans son environnement socioéconomique par le partenariat et la coopération, et finalement.</li>
        </ol>
        <p>En plus de la formation des étudiants et /ou le profilage de leurs compétences dans les domaines académiques, scientifiques et professionnels, l’EST de Dakhla, première grande école à vocation technique & technologique à la région Dakhla Oued Eddahab, mise davantage sur l’ancrage de l’esprit étudiant-citoyen, en tant que futur responsable managérial, social et politique.</p>
        <p>Nous comptons mobiliser et optimiser tous les moyens humains et matériels disponibles et engager tous les partenaires et les parties prenantes pour parvenir à ces fins. Nous allons nous baser sur les valeurs et les principes qui nous unissent :</p>
        <ul>
            <li>Bonne Gouvernance ;</li>
            <li>Transparence ;</li>
            <li>Professionnalisme ;</li>
            <li>Contextualisation ;</li>
            <li>Responsabilité Sociétale ;</li>
            <li>Proximité ;</li>
            <li>Evaluation & Qualité.</li>
        </ul>
        <p>Prof. Zouhir Mahani<br>Directeur de l’Ecole Supérieure de Technologie – Dakhla.</p>
    </div>
</section>

</div>
<center>
<button id="botonLeerMas" class="btn btn-primary">Leer más</button>
</center>


    <section id="filieres" style="margin-top: 50px;">
        <h2 style="text-align: center; margin-bottom: 30px;">Filières enseignées :</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Formation</th>
                    <th>Description</th>
                    <th>Conditions d'accès</th>
                    <th>Diplômes requis</th>
                    <th>Procédures de sélection</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Techniques de Management</td>
                    <td>Cette filière vise à former des professionnels capables de gérer efficacement des projets et des équipes dans divers domaines. Le management, dans le domaine des entreprises, consiste après avoir procédé aux études des situations et des besoins de services sur les plans commercial, administratif, productif…, à faire des choix d’ordre financier mais aussi, d’investissements, de ressources humaines...</td>
                    <td>Baccalauréat en sciences ou en sciences économiques (options économie ou gestion)</td>
                    <td>Baccalauréat en sciences ou en sciences économiques (options économie ou gestion)</td>
                    <td>La sélection se fait sur étude de dossier sur la base des notes obtenues à l’examen national du baccalauréat.</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Génie Informatique</td>
                    <td>Les étudiants de cette filière acquièrent des compétences en développement logiciel, réseaux, sécurité informatique et systèmes d’information.</td>
                    <td>Baccalauréat en sciences ou en sciences informatiques.</td>
                    <td>Baccalauréat en sciences ou en sciences informatiques.</td>
                    <td>La sélection se fait sur étude de dossier sur la base des notes obtenues à l’examen national du baccalauréat.</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Génie Électrique</td>
                    <td>Cette formation se concentre sur les domaines de l’électricité, de l’électronique et des énergies renouvelables.</td>
                    <td>Baccalauréat en sciences ou en sciences électriques.</td>
                    <td>Baccalauréat en sciences ou en sciences électriques.</td>
                    <td>La sélection se fait sur étude de dossier sur la base des notes obtenues à l’examen national du baccalauréat.</td>
                </tr>
            </tbody>
        </table>
    </section>
</main>

<br><br>
<footer class="container">
    <?php
    require './Footer/footer.php';
    ?>
    <a href="#" id="scrollToTop" class="btn">↑</a>
  </footer>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="./Js/bootstrap.bundle.min.js"></script>

<script>
    // Obtener referencias al botón y al contenido adicional
    var botonLeerMas = document.getElementById('botonLeerMas');
    var contenidoAdicional = document.getElementById('contenidoAdicional');

    // Agregar un event listener al botón
    botonLeerMas.addEventListener('click', function() {
        // Alternar la visibilidad del contenido adicional cuando se hace clic en el botón
        if (contenidoAdicional.style.display === 'none') {
            contenidoAdicional.style.display = 'block';
            botonLeerMas.textContent = 'Leer menos'; // Cambiar el texto del botón
        } else {
            contenidoAdicional.style.display = 'none';
            botonLeerMas.textContent = 'Leer más'; // Cambiar el texto del botón
        }
    });
</script>

<script>
    document.getElementById('scrollToTop').addEventListener('click', function() {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
</script>
</body>
</html>
