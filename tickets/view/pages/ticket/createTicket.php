<div class="mobile-menu-overlay"></div>

<div class="main-container">
    <div class="pd-ltr-20">
        <div class="card-box pd-20 height-100-p mb-30 center">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h4>
                        <div class="weight-600 font-30 text-black">Création d'un ticket</div>
                    </h4>
                </div>
            </div>
        </div>
        <form class="" action="#" method="POST">
                <div class="contentCrateTicket">
                    <div class="mb-30">
                        <div class="card-box height-100-p widget-style1">
                            <div class="d-flex flex-wrap align-items-center">
                                <div>Prénom</div>
                                <div><input name="surname" size="21" type="text" maxlength="25"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 mb-30">
                        <div class="card-box height-100-p widget-style1">
                            <div class="d-flex flex-wrap align-items-center">
                                <div>Nom</div>
                                <div><input name="name" size="53" type="text" maxlength="50"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 mb-30">
                        <div class="card-box height-100-p widget-style1">
                            <div class="d-flex flex-wrap align-items-center">
                                <div>Identifiant</div>
                                <div><input name="login" size="21" type="text" maxlength="20"></div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-30">
                        <div class="card-box height-100-p widget-style1">
                            <div class="d-flex flex-wrap align-items-center">
                                <div>Titre du ticket</div>
                                <div><input name="title" size="60" type="text" maxlength="60"></div>
                            </div>
                        </div>
                    </div>
                    
                </div>   
        <div class="contentCrateTicket">
            <div class="col-xl-1-2 mb-30">
                <div class="card-box height-100-p widget-style1">
                    <div class="d-flex flex-wrap align-items-center">
                        <div class="">
                            <div>Catégorie</div>
                            <div>
                                <select>
                                    <option>Matériel</option>
                                    <option>Technique</option>
                                    <option>...</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 mb-30">
                <div class="card-box height-100-p widget-style1">
                    <div class="d-flex flex-wrap align-items-center">
                    <div class="titlePriority">Urgence</div>
                        <div class="d-flex flex-row justify-content-arround contentCheckbox">
                            <div>
                                <input type="radio" name="urgence" value="1">
                                <label for="urgence">Pas urgent</label>
                            </div>
                            <div>
                                <input type="radio" name="urgence" value="2">
                                <label for="urgence">Urgent</label>
                            </div>
                            <div>
                                <input type="radio" name="urgence" value="3">
                                <label for="urgence">Très urgent</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>    
                <div class="mb-30 contentPriority">
                    <div class="card-box height-100-p widget-style1 d-flex flex-column justify-content-arround">
                        <div class="d-flex flex-wrap align-items-center">
                            <div class="titlePriority">Importance</div>
                            <div class="d-flex flex-row justify-content-arround contentCheckbox">
                                <div>
                                    <input type="radio" name="importance" value="1">
                                    <label for="importance">Peu important</label>
                                </div>
                                <div>
                                    <input type="radio" name="importance" value="2">
                                    <label for="importance">Important</label>
                                </div>
                                <div>
                                    <input type="radio" name="importance" value="3">
                                    <label for="importance">Très important</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="contentCrateTicket">
            <div class="col-xl-6 mb-30">
                <div class="card-box height-100-p widget-style1">
                    <div class="d-flex flex-wrap align-items-center">
                        <div>Description</div>
                        <div><textarea name="description" id="description"  rows="6" cols="91" placeholder="Décrire le problème précisement"></textarea></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 mb-30">
                <div class="card-box height-100-p widget-style1">
                    <div class="d-flex flex-wrap align-items-center">
                        <div>Suivis</div>
                        <div><textarea name="description" id="description"  rows="6" cols="91" placeholder="Décrire toutes les actions déjà faites (Ex: Débrancher rebrancher le câble)"></textarea></div>
                    </div>
                </div>
            </div>
        </div>    
            <input type="submit" class="buttonSubmit" value="Soumettre le Ticket">
        </form>
    </div>
</div>