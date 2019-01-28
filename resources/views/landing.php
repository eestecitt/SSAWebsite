<!DOCTYPE html>
<html>

    <head>
        <!-- Standard Meta -->
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="EESTEC Soft Skills Academy (SSA) is an international project organized by Electrical Engineering STudents’ European assoCiation (EESTEC).">
        <meta property="og:image" content="assets/images/ec-big-logo.png" />

        <!-- Site Properities -->
        <title>EESTEC Soft Skills Academy</title>

        <link rel="icon" type="image/png" href="favicon.ico" />
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" type="text/css" href="semantic/dist/semantic.min.css">
        <link rel="stylesheet" type="text/css" href="assets/lib/content-tools/content-tools.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/eca.css">
        <link rel="stylesheet" type="text/css" href="css/app.css">

        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    </head>

    <body ng-app="ecaApp" ng-controller="LandingLayoutController">
        <div class="ui top fixed menu">
            <div class="ui grid container">
                <div class="ui computer tablet only row">
                    <a ui-sref="home" class="header down borderless item">
                        <img class="ui tiny fluid image" src="assets/images/logo_ssa.jpg">
                    </a>
                    <h1 class="ui ssa-dark left huge header borderless item hugeFont">EESTEC Soft Skills Academy</h1>
                    <div class="right small menu">
                        <a ng-click="scrollTo('home')" ui-sref="home" class="borderless item">Home</a>
                        <!--<a ng-click="scrollTo('cities')" class="item">Cities</a>-->
                        <a ui-sref="sponsors" class="item">Sponsors</a>
                        <a ui-sref="eestec" class="item">EESTEC</a>
                        <a ng-click="scrollTo('contact')" class="item">Contact</a>
                        <!--
                        <div class="item" ng-show="!loggedin">
                            <a ui-sref="login" class="ui ec-blue button">
                                <i class="user icon"></i> Log in
                            </a>
                        </div>
                        <div ui-sref-active="active" class="ui dropdown item" ng-show="loggedin">
							Account <i class="dropdown icon"></i>
							<div class="menu">
								<a class="item" ui-sref="authed.team">
									<i class="users icon"></i> My Team
								</a>
								<a class="item" ng-click="logout()" ui-sref="login">
									<i class="log out icon"></i> Log out
								</a>
							</div>
						</div>-->
                    </div>
                </div>
                <div class="ui mobile only row">
                    <a ui-sref="home" class="header borderless item">
                        <img class="ui tiny fluid image" src="assets/images/logo_ssa.jpg">
                    </a>
                    <h1 class="ui ssa-dark left huge header borderless item">EESTEC Soft Skills Academy</h1>
                    <!--
                    <div class="right menu open">
                        <div class="item" ng-show="!loggedin">
                            <a ui-sref="login" class="ui ec-blue button">
                                <i class="user icon"></i>
                            </a>
                        </div>
                        <div class="ui dropdown item" ng-show="loggedin">
							Account <i class="dropdown icon"></i>
							<div class="menu">
								<a class="item" ui-sref="authed.team">
									<i class="users icon"></i> My Team
								</a>
								<a class="item" ng-click="logout()" ui-sref="login">
									<i class="log out icon"></i> Log out
								</a>
							</div>
						</div>-->
                        <a class="toggle right item">
                            <i class="ec-blue sidebar icon"></i>
                        </a>
                    </div>
                    <div class="ui inverted ec-blue vertical navbar menu hidden fluid">
                        <a ng-click="scrollTo('home')" ui-sref="home" class="item">Home</a>
                        <!--<a ng-click="scrollTo('cities')" class="item">Cities</a>-->
                        <a ui-sref="sponsors" class="item">Sponsors</a>
                        <a ui-sref="eestec" class="item">EESTEC</a>
                        <a ng-click="scrollTo('contact')" class="item">Contact</a>
                    </div>
                </div>
            </div>
        </div>

        <div ui-view></div>

        <div class="ui ec-blue inverted vertical footer bottom segment row" id="footer">
            <div class="ui container">
                <div class="ui stackable grid">
                    <div class="five wide column">
                        <h4 class="ui invertedheader">Overview</h4>
                        <div class="ui inverted link list">
                            <a ng-click="scrollTo('home')" ui-sref="home" class="item">Home</a>
                            <!--<a ng-click="scrollTo('cities')" class="item">Cities</a>-->
                            <a ui-sref="sponsors" class="item">Sponsors</a>
                            <a ui-sref="eestec" class="item">EESTEC</a>
                            <a ng-click="scrollTo('contact')" class="item">Contact</a>
                        </div>
                    </div>
                    <div class="six wide column">
                        <h4 class="ui inverted header">Contact Us</h4>
                        <div class="ui inverted link list">
                            <a href="mailto:ssa@eestec.net" class="item">ssa@eestec.net</a>
                        </div>
                    </div>
                    <div class="five wide column">
                        <h4 class="ui inverted header">Stay in touch</h4>
                        <div class="ui inverted link list">
                            <a href="https://www.facebook.com/eestecsoftskillsacademy/" target="_blank" class="item">
                                <button class="ui circular facebook icon button">
                                    <i class="facebook icon"></i>
                                </button>
                                Facebook
                            </a>
                            <a href="https://twitter.com/EESTEC_SSA" target="_blank" class="item">
                                <button class="ui circular twitter icon button">
                                    <i class="twitter icon"></i>
                                </button>
                                Twitter
                            </a>
                            <a href="https://www.instagram.com/eestec_ssa/" target="_blank" class="item">
                                <button class="ui circular instagram icon button">
                                    <i class="instagram icon"></i>
                                </button>
                                Instagram
                            </a>
                            <a href="https://www.linkedin.com/company/18304656/" target="_blank" class="item">
                                <button class="ui circular linkedin icon button">
                                    <i class="linkedin icon"></i>
                                </button>
                                LinkedIn
                            </a>
                        </div>
                    </div>
                </div>
                <div class="ui inverted section divider"></div>
                <div class="ui horizontal center aligned inverted small container">
                    <span>&copy; 2018 <a href="http://www.eestec.net" target="_blank">EESTEC International</a></span>
                </div>
            </div>
        </div>

        <script src="assets/lib/jquery-2.1.4.min.js"></script>
        <script src="assets/lib/jquery-observe.js"></script>
        <script src="semantic/dist/semantic.min.js"></script>
        <script src="assets/lib/angular.min.js"></script>
        <script src="assets/lib/angular-resource.js"></script>
        <script src="assets/lib/angular-ui-router.min.js"></script>
        <script src="assets/js/app.js"></script>
        <script src="assets/js/controller/login.js"></script>
        <script src="assets/js/controller/register.js"></script>
        <script src="assets/js/controller/landing.js"></script>
        <script src="assets/js/controller/team.js"></script>
        <script src="assets/js/controller/idea.js"></script>
        <script src="assets/js/controller/application.js"></script>
        <script src="assets/js/controller/admin.js"></script>
        <script src="assets/js/services/user.js"></script>
        <script src="assets/js/services/api.js"></script>
        <script src="assets/lib/content-tools/content-tools.min.js"></script>
        <script src="assets/js/eca.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/angular-ui-bootstrap/0.10.0/ui-bootstrap-tpls.min.js"></script>
    </body>

</html>
