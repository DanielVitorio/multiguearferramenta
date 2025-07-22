<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multiguear</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="/images/MultiGears-favicon.ico" type="image/x-icon">
</head>
<body>
    <header class="w-full h-20 bg-white shadow-md flex items-center justify-between px-4">
        <a href="#"><img class="logo w-40" src="/images/LogoLight.png" alt="Logo"></a>
    </header>

    <section class="dark:bg-gray-100 main dark:text-gray-800">
        <div class="container flex flex-col justify-center p-6 mx-auto sm:py-12 lg:py-24 lg:flex-row lg:justify-between">
            <div class="flex flex-col justify-center p-6 text-center rounded-sm lg:max-w-md xl:max-w-lg lg:text-left">
                <h1 class="text-5xl font-bold leading-none sm:text-6xl">
                    <div class="card2">
                        <div class="loader">
                            <p class="dark:text-violet-600">Multi</p>
                            <div class="words">
                                <span class="word">Guears</span>
                                <span class="word">Youtility</span>
                                <span class="word">Contax</span>
                                <span class="word">Acessos</span>
                                <span class="word">Guears</span>
                            </div>
                        </div>
                        <span class="dark:text-violet-600">Plataforma de Multiferramentas</span>
                    </div>
                </h1>
                <p class="mt-6 mb-8 text-lg sm:mb-12">
                    Bem-vindo ao MultiGears!
                    <br>
                    Youtility Center (Contax)
                </p>
                <div class="flex flex-col space-y-4 sm:items-center sm:justify-center sm:flex-row sm:space-y-0 sm:space-x-4 lg:justify-start">
                    <a href="/admin/login" style="background-color: #78288c; color: #fff;" class="px-8 py-3 text-lg font-semibold rounded button hover:bg-opacity-80">Administradores</a>
                    <a href="/ti/login" class="px-8 py-3 text-lg font-semibold border rounded button dark:border-gray-800">Departamento de TI</a>
                </div>
            </div>
            <div class="flex image items-center justify-center p-6 mt-8 lg:mt-0 h-72 sm:h-80 lg:h-96 xl:h-112 2xl:h-128">
            </div>
        </div>

        <div class="cards flex flex-col md:flex-row justify-evenly items-center py-10 gap-6">
            <div class="card">
                <div class="content">
                    <p class="heading">Card</p>
                    <p class="para">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi laboriosam at voluptas minus culpa deserunt delectus sapiente inventore pariatur.</p>
                </div>
            </div>
            <div class="card">
                <div class="content">
                    <p class="heading">Card</p>
                    <p class="para">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi laboriosam at voluptas minus culpa deserunt delectus sapiente inventore pariatur.</p>
                </div>
            </div>
            <div class="card">
                <div class="content">
                    <p class="heading">Card</p>
                    <p class="para">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi laboriosam at voluptas minus culpa deserunt delectus sapiente inventore pariatur.</p>
                </div>
            </div>
        </div>
    </section>

    <style>
        .logo {
            width: 200px;
        }

        .main{
        margin-top: -50px;
        }

        .image{
        width: 450px;
        height: 450px;
        background-image: url('/images/Business_SVG.svg');
        background-size: 100%;
        background-repeat: no-repeat;
        }

        .card2 {
            padding-bottom: 2rem;
            border-radius: 1.25rem;
        }

        .loader {
            display: flex;
            height: 60px;
            margin-top: 5px;
            border-radius: 8px;
        }

        .words {
            overflow: hidden;
            position: relative;
        }

        .word {
            display: block;
            height: 150%;
            color: #78288c;
            animation: spin_4991 10s infinite;
        }

        /* From Uiverse.io by adamgiebl */ 
        .button {
        position: relative;
        display: inline-block;
        text-decoration: none;
        background: transparent;
        cursor: pointer;
        transition: ease-out 0.5s;
        box-shadow: inset 0 0 0 0 #725AC1;
        }

        .button:hover {
        color: white;
        box-shadow: inset 0 -100px 0 0 #725AC1;
        }

        .button:active {
        transform: scale(0.9);
        }

        @keyframes spin_4991 {
            10% { transform: translateY(-105%); }
            25% { transform: translateY(-103%); }
            35% { transform: translateY(-205%); }
            50% { transform: translateY(-203%); }
            60% { transform: translateY(-305%); }
            75% { transform: translateY(-303%); }
            85% { transform: translateY(-405%); }
            100% { transform: translateY(-403%); }
        }

        .card {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            width: 400px;
            padding: 2px;
            border-radius: 24px;
            overflow: hidden;
            transition: all 0.48s cubic-bezier(0.23, 1, 0.32, 1);
        }

        .content {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            gap: 24px;
            padding: 34px;
            color: #ffffff;
            background: #ffffff;
            transition: all 0.48s cubic-bezier(0.23, 1, 0.32, 1);
        }

        .content .heading {
            font-weight: 700;
            font-size: 36px;
            line-height: 1.3;
            z-index: 1;
        }

        .content .para {
            opacity: 0.8;
            font-size: 18px;
            z-index: 1;
        }

        .card::before {
            content: "";
            position: absolute;
            height: 160%;
            width: 160%;
            border-radius: inherit;
            background: linear-gradient(to right, #78288c, #78288c);
            transform-origin: center;
            animation: moving 4.8s linear infinite paused;
            transition: all 0.88s cubic-bezier(0.23, 1, 0.32, 1);
        }

        .card:hover::before {
            animation-play-state: running;
            z-index: -1;
            width: 20%;
        }

        .card:hover .content .heading,
        .card:hover .content .para {
            color: #000;
        }

        .card:hover {
            box-shadow: 0 6px 13px rgba(120, 40, 140, 0.1), 0 24px 24px rgba(120, 40, 140, 0.9), 0 55px 33px rgba(120, 40, 140, 0.5), 0 97px 39px rgba(120, 40, 140, 0.1), 0 152px 43px rgba(120, 40, 140, 0);
            transform: scale(1.05);
        }

        @media screen and (max-width: 1030px) {
            .image {
                display: none;
            }
        }
    </style>
</body>
</html>
