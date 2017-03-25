<?php
if(isset($_POST['contenu']))
{
    $_SESSION['contenu']=$_POST['contenu'];
    header('Location:envoiemail.php');
}


?>
<div id="modal1" class="modal">
    <div class="modal-content">
        <h4>Entrer votre Email et Mot de passe</h4>
        <div class="row">
            <form class="col s12">
                <div class="col s2"></div>
                <div class="col s8">
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="email" type="email" class="validate">
                            <label for="email" data-error="wrong" data-success="right">Email</label>
                        </div>
                        <div class="input-field col s12">
                            <input id="password" type="password" class="validate ">
                            <label for="password">Password</label>
                        </div>
                        <div class="input-field col s12">
                            <div class="col s6">
                                <button class="btn waves-effect waves-light grey darken-2" type="submit" name="action">Submit
                                    <i class="material-icons right">send</i>
                                </button>
                            </div>
                            <div class="col s6">
                                <button class="btn waves-effect waves-light grey darken-2"  type="reset" name="action">Reset
                                    <i class="material-icons">eject</i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col s2"></div>
            </form>
        </div>
    </div>
</div>
    <!-- fin Modal Structure -->
<!-- Modal Inscription -->
    <div id="modal2" class="modal">
        <div class="modal-content">
            <h4> Vous etes ...</h4>
            <div class="row">

                    <div class="col s2"></div>
                    <div class="col s8">
                        <div class="row">
                            <div class="input-field col s12">
                                <div class="col s6">
                                    <a href="#" class="waves-effect waves-light btn-large">Donateurs</a>
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
<!-- Modal Envoi MAil -->
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