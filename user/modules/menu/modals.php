<!-- Modal gia entoli agoras-->
<div class="modal fade" id="nea_entolh_agoras" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" 
                   data-dismiss="modal">
                       <span aria-hidden="true">&times;</span>
                       <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">
                     Νέα Εντολή Αγοράς
                </h4>
            </div>
            
            <!-- Modal Body -->
            <div class="modal-body">
                
                <form role="form">
                  <div class="form-group">
                    <label for="metoxh">Μετοχή</label>
                      <select class="form-control" id="metoxh">
                          <option selected value=""> -- Επιλέξτε μετοχή -- </option>
                      </select>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputTimi"> Τιμή</label>
                      <input type="text" class="form-control"
                      id="exampleInputTimi" placeholder="Εισαγωγή τιμής"/>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPieces"> Κομμάτια</label>
                      <input type="text" class="form-control"
                      id="exampleInputPieces" placeholder="Εισαγωγή τεμαχίων"/>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPieces"> Ημερομηνία λήξης εντολής</label>
                    <input type='text' class="datepicker" id="exampleInputDateExpire" placeholder="Επιλέξτε ημερομηνία" />
                  </div>
                
                </form>   
            </div>
            
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default"
                        data-dismiss="modal">
                            ΑΚΥΡΟ
                </button>
                <button type="button" class="btn btn-primary">
                    ΕΠΙΒΕΒΑΙΩΣΗ
                </button>
            </div>
        </div>
    </div>
</div>

<!-- modal gia entoli pwlhshs -->
<div class="modal fade" id="nea_entolh_polhshs" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" 
                   data-dismiss="modal">
                       <span aria-hidden="true">&times;</span>
                       <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel2">
                     Νέα Εντολή Πώλησης
                </h4>
            </div>
            
            <!-- Modal Body -->
            <div class="modal-body">
                
                <form role="form">
                  <div class="form-group">
                    <label for="metoxh">Μετοχή</label>
                      <select class="form-control" id="metoxh">
                          <option selected value=""> -- Επιλέξτε μετοχή -- </option>
                      </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputTimi"> Τιμή</label>
                      <input type="text" class="form-control"
                      id="exampleInputTimi" placeholder="Εισαγωγή τιμής"/>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPieces"> Κομμάτια</label>
                      <input type="text" class="form-control"
                      id="exampleInputPieces" placeholder="Εισαγωγή τεμαχίων"/>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPieces"> Ημερομηνία λήξης πώλησης</label>
                    <input type='text' class="datepicker" id="exampleInputDateExpire" placeholder="Επιλέξτε ημερομηνία" />
                  </div>
                </form>            
            </div>
            
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default"
                        data-dismiss="modal">
                            ΑΚΥΡΟ
                </button>
                <button type="button" class="btn btn-primary">
                    ΕΠΙΒΕΒΑΙΩΣΗ
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Modal gia katathesi posou -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">ΚΑΤΑΘΕΣΗ</h4>
                 </div>
                     <div class="modal-body">
                         <div class="form-group">
                             <label for="exampleInputTimi"> Ποσό</label>
                                 <input type="text" class="form-control"
                                 id="exampleInputTimi" placeholder="Δώστε το επιθυμητο ποσό"/>
                        </div>
                     </div>

 <!-- Modal Footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-default"
                        data-dismiss="modal">
                            ΑΚΥΡΟ
        </button>
        <button type="button" class="btn btn-primary">
                    ΕΠΙΒΕΒΑΙΩΣΗ
        </button>
      </div>
    </div>

  </div>
</div>  

<!-- Modal gia analipsi posou-->
<div id="myModal1" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">ΑΝΑΛΗΨΗ</h4>
                 </div>
                     <div class="modal-body">
                         <div class="form-group">
                             <label for="exampleInputTimi"> Ποσό</label>
                                 <input type="text" class="form-control"
                                 id="exampleInputTimi" placeholder="Δώστε το επιθυμητο ποσό"/>
                        </div>
                     </div>

 <!-- Modal Footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-default"
                        data-dismiss="modal">
                            ΑΚΥΡΟ
        </button>
        <button type="button" class="btn btn-primary">
                    ΕΠΙΒΕΒΑΙΩΣΗ
        </button>
      </div>
    </div>

  </div>
</div>  
            