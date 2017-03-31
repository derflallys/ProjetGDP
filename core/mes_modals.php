<div id="modal1" class="modal">
    <div class="modal-content">
        
        <div class="row">
            
                <div class="col s1"></div>
                <div class="col s10">
                    <div class="row">
                        <div class="input-field col s12">
                            <h4 class="align-text"> Vous etes ...</h4>
                                <div class="col s6">
                                    <button class="btn waves-effect waves-light grey darken-2" id="bt_donateur" >Donateurs
                                    
                                    </button>
                                </div>
                                <div class="col s6">
                                    <button class="btn waves-effect waves-light grey darken-2" id="bt_fournisseur" >Fournisseurs
                                    
                                    </button>
                                </div>
                            </div>
                        <div id="donateur" hidden="true">
                        <h4 class="align-text">Entrer votre Email et Mot de passe</h4>
                            <form class="col s12" method="POST" action="m_users/authentification.php">    
                            <div class="input-field col s12">
                                <input id="email" type="email" name="email" class="validate">
                                <label for="email" data-error="wrong" data-success="right">Email</label>
                            </div>
                            <div class="input-field col s12">
                                <input id="password" name="password" type="password" class="validate ">
                                <label for="password">Password</label>
                            </div>
                            <div class="input-field col s12">
                                <div class="col s6">
                                    <button class="btn waves-effect waves-light grey darken-2" type="submit" name="connect">Submit
                                        <i class="material-icons right">send</i>
                                    </button>
                                </div>
                                <div class="col s6">
                                    <button class="btn waves-effect waves-light grey darken-2" type="reset" name="action">Reset
                                        <i class="material-icons">eject</i>
                                    </button>
                                </div>
                            </div>
                            </form>
                        </div>
                        <div id="fournisseur" hidden="true">
                        <h4 class="align-text">Entrer votre Email et Mot de passe</h4>
                            <form class="col s12" method="POST" action="m_users/authentification_restaurant.php">    
                            <div class="input-field col s12">
                                <input id="email" type="email" name="email" class="validate">
                                <label for="email" data-error="wrong" data-success="right">Email</label>
                            </div>
                            <div class="input-field col s12">
                                <input id="password" name="password" type="password" class="validate ">
                                <label for="password">Password</label>
                            </div>
                            <div class="input-field col s12">
                                <div class="col s6">
                                    <button class="btn waves-effect waves-light grey darken-2" type="submit" name="connect">Submit
                                        <i class="material-icons right">send</i>
                                    </button>
                                </div>
                                <div class="col s6">
                                    <button class="btn waves-effect waves-light grey darken-2" type="reset" name="action">Reset
                                        <i class="material-icons">eject</i>
                                    </button>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col s1"></div>
            
        </div>
    </div>
</div>
    <!-- fin Modal Structure -->
    <!-- Modal INscription -->
    <div id="modal2" class="modal">
        <div class="modal-content">
            <h4 class="align-text"> Vous etes ...</h4>
            <div class="row">
                <form class="col s12">
                    <div class="col s2"></div>
                    <div class="col s8">
                        <div class="row">
                            <div class="input-field col s12">
                                <div class="col s6">
                                    <a href="m_users/formulaire_association.php" class="waves-effect waves-light btn-large">Donateurs</a>
                                </div>
                                <div class="col s6">
                                    <a href="m_users/formulaire_restaurant.php" class="waves-effect waves-light btn-large">Fournisseurs</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col s2"></div>

            </div>
        </div>
    </div>

     <!-- Modal Connexion -->
    <div id="modal4" class="modal">
        <div class="modal-content">
            <h4> Vous etes ...</h4>
            <div class="row">
                <form class="col s12">
                    <div class="col s2"></div>
                    <div class="col s8">
                        <div class="row">
                            <div class="input-field col s12">
                                <div class="col s6">
                                    <a href="#" data-target="modal4" class="waves-effect waves-light btn-large">Donateurs</a>
                                </div>
                                <div class="col s6">
                                    <a href="#" class="waves-effect waves-light btn-large">Fournisseurs</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col s2"></div>

            </div>
        </div>
    </div>
<!-- Modal Envoi MAil
<div id="modal3" class="modal">
    <div class="modal-content">
        <h4 align-text> Veillez Rediger le contenu du mail s'il vous plait</h4>
        <div class="row">
            <form class="col s12">
                <div class="col s2"></div>
                <div class="col s8">
                    <div class="row">
                        <form class="col s12" method="POST" action="#" >
                            <div class="row">
                                <div class="input-field col s12">
                                    <textarea id="textarea1" name="contenu" class="materialize-textarea"></textarea>
                                    <label for="textarea1">Contenu Mail</label>
                                </div>

                                <button class="btn waves-effect waves-light grey darken-2" type="submit" >Submit
                                    <i class="material-icons right">send</i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col s2"></div>
            </form>
        </div>
    </div>
</div>
-->