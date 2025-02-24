<!DOCTYPE html>
<html lang="fr" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - Portfolio</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.html">Portfolio.</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                    <ul class="navbar-nav ms-0">
                        <li class="nav-item"><a class="nav-link" href="index.html#home">Accueil</a></li>
                        <li class="nav-item"><a class="nav-link" href="index.html#about">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="index.html#skills">Compétences</a></li>
                        <li class="nav-item"><a class="nav-link" href="Project.html">Projets</a></li>
                        <li class="nav-item"><a class="nav-link active" href="contact.html">Contact</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <section class="contact-section py-5">
        <div class="container">
            <!-- à revoir l'affichage h2"contact" avec figma pour une meilleure animation -->
            <h2 class="section-title text-center mb-5 animate-on-scroll">Contact</h2>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card bg-dark animate-on-scroll">
                        <div class="card-body">
                            <?php
                            if (isset($_GET['success'])) {
                                echo '<p class="alert alert-success">Votre message a bien été envoyé !</p';
                            }
                            if (isset($_GET['error'])) {
                                echo '<p class="alert alert-danger">Votre message n\'a pas pu être envoyé !</p';
                            }
                            ?>
                            <form id="contactForm" class="needs-validation" novalidate action="traitement_contact.php" method="POST">
                                <div class="mb-4">
                                    <label for="name" class="form-label">Nom</label>
                                    <input type="text" class="form-control" id="name" required name="name">
                                    <div class="invalid-feedback">
                                        Veuillez entrer votre nom
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" required name="email">
                                    <div class="invalid-feedback">
                                        Veuillez entrer une adresse email valide
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label for="message" class="form-label">Message</label>
                                    <textarea class="form-control" id="message" rows="5" required name="message"></textarea>
                                    <div class="invalid-feedback">
                                        Veuillez entrer votre message
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary px-5" name="bout">Envoyer</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div id="confirmationToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <i class="bi bi-check-circle-fill text-success me-2"></i>
                <strong class="me-auto">Succès</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                Votre message a été envoyé avec succès !
            </div>
        </div>
    </div>

    <footer id="contact">
        <div class="container text-center">
            <p>&copy; 2025 Franck-Arsène KOUASSI | Tous droits réservés.</p>
            <a href="https://www.linkedin.com/in/franck-kouassi-74a007305/" class="text-light mx-2"><i class="bi bi-linkedin"></i></a>
            <a href="https://github.com/FRznck" class="text-light mx-2"><i class="bi bi-github"></i></a>
        </div>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('contactForm');
            const toast = new bootstrap.Toast(document.getElementById('confirmationToast'));


            const animateOnScroll = document.querySelectorAll('.animate-on-scroll');
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('fade-in');
                    }
                });
            });

            animateOnScroll.forEach(element => observer.observe(element));
        });
    </script>

    <style>
        .contact-section {
            min-height: 100vh;
            padding-top: 80px;
        }

        .card {
            border: none;
            box-shadow: var(--box-shadow);
            background: rgba(255, 255, 255, 0.05) !important;
        }

        .form-control {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: var(--text-color);
            transition: all 0.3s ease;
        }

        .form-control:focus {
            background: rgba(255, 255, 255, 0.15);
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(32, 201, 151, 0.25);
        }

        .btn-primary {
            background-color: var(--primary-color);
            border: none;
            padding: 10px 30px;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #1ba883;
            transform: translateY(-2px);
        }

        .animate-on-scroll {
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.6s ease;
        }

        .animate-on-scroll.fade-in {
            opacity: 1;
            transform: translateY(0);
        }

        @media (max-width: 768px) {
            .contact-section {
                padding-top: 60px;
            }
        }
    </style>
</body>

</html>