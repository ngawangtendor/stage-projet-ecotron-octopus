<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Octopus</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Container for the title */
        .title-container {
            height: 30vh; /* 30% of the viewport height */
            display: flex; /* Using flexbox to center the content */
            align-items: center; /* Vertically center the content */
            justify-content: center; /* Horizontally center the content */
            min-height: 30vh; /* Minimum height to occupy the space */
            color: white; /* White text */
            background-color: #000000; /* Black background */
            transition: all 0.3s ease; /* Smooth animation for style changes */
        }

        /* Styles for mobile screens */
        @media (max-width: 768px) {
            .title-container {
                min-height: 30vh; /* Adjusted height for small screens */
                padding: 2rem 1rem; /* Adjust internal padding */
            }
        }

        /* Style for the button with a maximum width */
        .btn-outline-primary {
            max-width: 600px; /* Maximum button width */
            margin: 0 auto; /* Center the button horizontally */
            padding: 20px; /* Internal padding of the button */
        }



        /* flex box */
        .custom-card {
          background: rgb(251, 233, 100) !important;
          box-shadow: 0 2px 5px rgba(238, 178, 178, 0.1);
          border: none;
          transition: all .1s ease-in;
          text-decoration: none;
          color: #78f7ab;
          position: relative;
          top: 20px;
        }

        .custom-card:hover {
            top: -2px;
            box-shadow: 0 4px 5px rgba(239, 127, 127, 0.2) !important;
        }

        .custom-thumb {
            padding-bottom: 50%;
            background-size: cover;
            background-position: center center;
        }

        .card-title {
            font-size: 20px;
            margin: 10px;
            color: #333 !important;
            text-align: center;
        }

        /* Custom style for the footer */
        .custom-footer {
            background-color: #747679; /* Grey background color */
            padding: 10px 0; /* Spacing around the content */
            border-top: 1px solid #dee2e6; /* Top border to separate from the rest of the content */
            position: fixed; /* Fix the footer at the bottom of the screen */
            bottom: 0; /* Position it at the bottom */
            left: 0; /* Align to the left */
            right: 0; /* Align to the right */
        }
    
   </style>
</head>
<body>
    <!-- Header -->
    <header class="navbar" style="background-color: rgb(181, 243, 222);">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <!-- Logo et Titre (à gauche) -->
            <a class="navbar-brand d-flex align-items-center" href="#">
                <img src="image/octopus-svgrepo-com.svg" alt="Logo" width="50" height="40" class="d-inline-block align-text-top me-2 d-none d-sm-block">
                <span class="fs-3 fw-bolder">Octopus</span>
            </a>

            <!-- Boutons de Retour (à droite) -->
            <div class="d-flex gap-2">
                <!-- Retour vers une page spécifique -->
                <a href="../index.html" class="btn btn-success">Retour à l'accueil</a>
                <!-- Retour à la page précédente -->
                <button onclick="history.back()" class="btn btn-secondary">Retour</button>
            </div>
        </div>
    </header>
</body>