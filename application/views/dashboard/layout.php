<?php
/** @var Html_Page $page */
//todo: use base template
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Test description">

    <title><?php echo $page->title(); ?></title>

    <!-- Page styles -->
    <?php foreach ($page->style() as $style) : ?>
        <?php echo $style; ?>
    <?php endforeach; ?>

    <!-- Favicons -->
</head>

<body>
<!-- Page menu -->
<?php echo  $page->menu(); ?>

<div class="wrapper">
    <!-- Sidebar  -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <h3>Bootstrap Sidebar</h3>
            <strong>BS</strong>
        </div>

        <ul class="list-unstyled components">
            <li class="active">
                <a href="https://bootstrapious.com/tutorial/sidebar/index4.html#homeSubmenu" data-toggle="collapse"
                   aria-expanded="false" class="dropdown-toggle">
                    <svg class="svg-inline--fa fa-home fa-w-18" aria-hidden="true" data-prefix="fas" data-icon="home"
                         role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="">
                        <path fill="currentColor"
                              d="M488 312.7V456c0 13.3-10.7 24-24 24H348c-6.6 0-12-5.4-12-12V356c0-6.6-5.4-12-12-12h-72c-6.6 0-12 5.4-12 12v112c0 6.6-5.4 12-12 12H112c-13.3 0-24-10.7-24-24V312.7c0-3.6 1.6-7 4.4-9.3l188-154.8c4.4-3.6 10.8-3.6 15.3 0l188 154.8c2.7 2.3 4.3 5.7 4.3 9.3zm83.6-60.9L488 182.9V44.4c0-6.6-5.4-12-12-12h-56c-6.6 0-12 5.4-12 12V117l-89.5-73.7c-17.7-14.6-43.3-14.6-61 0L4.4 251.8c-5.1 4.2-5.8 11.8-1.6 16.9l25.5 31c4.2 5.1 11.8 5.8 16.9 1.6l235.2-193.7c4.4-3.6 10.8-3.6 15.3 0l235.2 193.7c5.1 4.2 12.7 3.5 16.9-1.6l25.5-31c4.2-5.2 3.4-12.7-1.7-16.9z"></path>
                    </svg><!-- <i class="fas fa-home"></i> -->
                    Home
                </a>
                <ul class="collapse list-unstyled" id="homeSubmenu">
                    <li>
                        <a href="https://bootstrapious.com/tutorial/sidebar/index4.html#">Home 1</a>
                    </li>
                    <li>
                        <a href="https://bootstrapious.com/tutorial/sidebar/index4.html#">Home 2</a>
                    </li>
                    <li>
                        <a href="https://bootstrapious.com/tutorial/sidebar/index4.html#">Home 3</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="https://bootstrapious.com/tutorial/sidebar/index4.html#">
                    <svg class="svg-inline--fa fa-briefcase fa-w-16" aria-hidden="true" data-prefix="fas"
                         data-icon="briefcase" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                         data-fa-i2svg="">
                        <path fill="currentColor"
                              d="M320 288h192v144c0 26.51-21.49 48-48 48H48c-26.51 0-48-21.49-48-48V288h192v20c0 6.627 5.373 12 12 12h104c6.627 0 12-5.373 12-12v-20zm192-112v80H0v-80c0-26.51 21.49-48 48-48h80V80c0-26.51 21.49-48 48-48h160c26.51 0 48 21.49 48 48v48h80c26.51 0 48 21.49 48 48zM320 96H192v32h128V96z"></path>
                    </svg><!-- <i class="fas fa-briefcase"></i> -->
                    About
                </a>
                <a href="https://bootstrapious.com/tutorial/sidebar/index4.html#pageSubmenu" data-toggle="collapse"
                   aria-expanded="false" class="dropdown-toggle">
                    <svg class="svg-inline--fa fa-copy fa-w-14" aria-hidden="true" data-prefix="fas" data-icon="copy"
                         role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                        <path fill="currentColor"
                              d="M320 448v40c0 13.255-10.745 24-24 24H24c-13.255 0-24-10.745-24-24V120c0-13.255 10.745-24 24-24h72v296c0 30.879 25.121 56 56 56h168zm0-344V0H152c-13.255 0-24 10.745-24 24v368c0 13.255 10.745 24 24 24h272c13.255 0 24-10.745 24-24V128H344c-13.2 0-24-10.8-24-24zm120.971-31.029L375.029 7.029A24 24 0 0 0 358.059 0H352v96h96v-6.059a24 24 0 0 0-7.029-16.97z"></path>
                    </svg><!-- <i class="fas fa-copy"></i> -->
                    Pages
                </a>
                <ul class="collapse list-unstyled" id="pageSubmenu">
                    <li>
                        <a href="https://bootstrapious.com/tutorial/sidebar/index4.html#">Page 1</a>
                    </li>
                    <li>
                        <a href="https://bootstrapious.com/tutorial/sidebar/index4.html#">Page 2</a>
                    </li>
                    <li>
                        <a href="https://bootstrapious.com/tutorial/sidebar/index4.html#">Page 3</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="https://bootstrapious.com/tutorial/sidebar/index4.html#">
                    <svg class="svg-inline--fa fa-image fa-w-16" aria-hidden="true" data-prefix="fas" data-icon="image"
                         role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                        <path fill="currentColor"
                              d="M464 448H48c-26.51 0-48-21.49-48-48V112c0-26.51 21.49-48 48-48h416c26.51 0 48 21.49 48 48v288c0 26.51-21.49 48-48 48zM112 120c-30.928 0-56 25.072-56 56s25.072 56 56 56 56-25.072 56-56-25.072-56-56-56zM64 384h384V272l-87.515-87.515c-4.686-4.686-12.284-4.686-16.971 0L208 320l-55.515-55.515c-4.686-4.686-12.284-4.686-16.971 0L64 336v48z"></path>
                    </svg><!-- <i class="fas fa-image"></i> -->
                    Portfolio
                </a>
            </li>
            <li>
                <a href="https://bootstrapious.com/tutorial/sidebar/index4.html#">
                    <svg class="svg-inline--fa fa-question fa-w-12" aria-hidden="true" data-prefix="fas"
                         data-icon="question" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"
                         data-fa-i2svg="">
                        <path fill="currentColor"
                              d="M202.021 0C122.202 0 70.503 32.703 29.914 91.026c-7.363 10.58-5.093 25.086 5.178 32.874l43.138 32.709c10.373 7.865 25.132 6.026 33.253-4.148 25.049-31.381 43.63-49.449 82.757-49.449 30.764 0 68.816 19.799 68.816 49.631 0 22.552-18.617 34.134-48.993 51.164-35.423 19.86-82.299 44.576-82.299 106.405V320c0 13.255 10.745 24 24 24h72.471c13.255 0 24-10.745 24-24v-5.773c0-42.86 125.268-44.645 125.268-160.627C377.504 66.256 286.902 0 202.021 0zM192 373.459c-38.196 0-69.271 31.075-69.271 69.271 0 38.195 31.075 69.27 69.271 69.27s69.271-31.075 69.271-69.271-31.075-69.27-69.271-69.27z"></path>
                    </svg><!-- <i class="fas fa-question"></i> -->
                    FAQ
                </a>
            </li>
            <li>
                <a href="https://bootstrapious.com/tutorial/sidebar/index4.html#">
                    <svg class="svg-inline--fa fa-paper-plane fa-w-16" aria-hidden="true" data-prefix="fas"
                         data-icon="paper-plane" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                         data-fa-i2svg="">
                        <path fill="currentColor"
                              d="M476 3.2L12.5 270.6c-18.1 10.4-15.8 35.6 2.2 43.2L121 358.4l287.3-253.2c5.5-4.9 13.3 2.6 8.6 8.3L176 407v80.5c0 23.6 28.5 32.9 42.5 15.8L282 426l124.6 52.2c14.2 6 30.4-2.9 33-18.2l72-432C515 7.8 493.3-6.8 476 3.2z"></path>
                    </svg><!-- <i class="fas fa-paper-plane"></i> -->
                    Contact
                </a>
            </li>
        </ul>

        <ul class="list-unstyled CTAs">
            <li>
                <a href="https://bootstrapious.com/tutorial/files/sidebar.zip" class="download">Download source</a>
            </li>
            <li>
                <a href="https://bootstrapious.com/p/bootstrap-sidebar" class="article">Back to article</a>
            </li>
        </ul>
    </nav>

    <!-- Page Content  -->
    <div id="content">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">

                <button type="button" id="sidebarCollapse" class="btn btn-info">
                    <svg class="svg-inline--fa fa-align-left fa-w-14" aria-hidden="true" data-prefix="fas"
                         data-icon="align-left" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                         data-fa-i2svg="">
                        <path fill="currentColor"
                              d="M288 44v40c0 8.837-7.163 16-16 16H16c-8.837 0-16-7.163-16-16V44c0-8.837 7.163-16 16-16h256c8.837 0 16 7.163 16 16zM0 172v40c0 8.837 7.163 16 16 16h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16zm16 312h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm256-200H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16h256c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16z"></path>
                    </svg><!-- <i class="fas fa-align-left"></i> -->
                    <span>Toggle Sidebar</span>
                </button>
                <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <svg class="svg-inline--fa fa-align-justify fa-w-14" aria-hidden="true" data-prefix="fas"
                         data-icon="align-justify" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                         data-fa-i2svg="">
                        <path fill="currentColor"
                              d="M0 84V44c0-8.837 7.163-16 16-16h416c8.837 0 16 7.163 16 16v40c0 8.837-7.163 16-16 16H16c-8.837 0-16-7.163-16-16zm16 144h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm0 256h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm0-128h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16z"></path>
                    </svg><!-- <i class="fas fa-align-justify"></i> -->
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="https://bootstrapious.com/tutorial/sidebar/index4.html#">Page</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://bootstrapious.com/tutorial/sidebar/index4.html#">Page</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://bootstrapious.com/tutorial/sidebar/index4.html#">Page</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://bootstrapious.com/tutorial/sidebar/index4.html#">Page</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <h2>Collapsible Sidebar Using Bootstrap 4</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
            dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex
            ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
            nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit
            anim id est laborum.</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
            dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex
            ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
            nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit
            anim id est laborum.</p>

        <div class="line"></div>

        <h2>Lorem Ipsum Dolor</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
            dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex
            ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
            nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit
            anim id est laborum.</p>

        <div class="line"></div>

        <h2>Lorem Ipsum Dolor</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
            dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex
            ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
            nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit
            anim id est laborum.</p>

        <div class="line"></div>

        <h3>Lorem Ipsum Dolor</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
            dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex
            ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
            nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit
            anim id est laborum.</p>
    </div>
</div>

<!-- Page scripts -->
<?php foreach ($page->script() as $script) : ?>
    <?php echo $script; ?>
<?php endforeach; ?>
</body>

</html>