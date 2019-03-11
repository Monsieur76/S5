<?php
$this->title ='registration'; ?>
            <div class="container">
                <div class="row">
                            <div class="card col-lg-7" style="width: 18rem;align-items: center;
                            margin-bottom: 70px">
                                <img src="../Public/img/inscription1.gif" class="card-img-top" style="margin-top: 15px;width: 100%;">
                                <div class="card-body">
                   <form action="?route=enregistrement_bon" method='POST'>
                       <div class="form-group row">
                       <label for="inputname1" class="col-sm-4 col-form-label">Identifiant</label>
                           <div class="col-sm-8">
                        <input type="text" id="inputname1" name="name" placeholder='cromwell'
                               class="form-control text-center"/>
                           </div>
                       </div>
                       <div class="form-group row">
                       <label for="inputname2" class="col-sm-4 col-form-label">Password</label>
                       <div class="col-sm-8">
                        <input type="password" id="inputname2" name="pass_register"
                               placeholder='azerty' class="form-control text-center"/>
                       </div>
                                </div>
                       <div class="form-group row">
                       <label for="inputname3" class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                        <input type="text" name="mail" id="inputname3" placeholder='azerty@hotmail.fr'
                               class="form-control text-center"/>
                            </div>
                </div>
                        <input type='submit' class="btnColor btn-dark form-control"
                               name='submit_register' value='Envoyer' />
            </form>
                    </div>
            </div>
                </div>
            </div>