  <!-- Search Start -->
  <div class="container-fluid bg-white pt-3 px-lg-5">
      <div class="row mx-n2">
          <div class="col-xl-2 col-lg-4 col-md-6 px-2">
              <label for=" " class="form-label">Lieu de prise en charge</label>
              <select class="custom-select px-4 mb-3" style="height: 50px;">
                  <option selected></option>
                  <optgroup label="Aéroports">
                      <option value="TUN">Aéroport Tunis Carthage</option>
                      <option value="NBE">Aéroport Enfidha</option>
                      <option value="MIR">Aéroport Monastir</option>
                      <option value="DJE">Aéroport Djerba</option>
                      <option value="TBJ">Aéroport Tozeur</option>
                  </optgroup>

                  <optgroup label="Centres-Villes">
                      <option value="Tunis">Tunis</option>
                      <option value="Hammamet">Hammamet</option>
                      <option value="Sousse">Sousse</option>
                      <option value="Monastir">Monastir</option>
                      <option value="Djerba">Djerba</option>
                      <option value="Kairouan">Kairouan</option>
                      <option value="Sfax">Sfax</option>
                      <option value="Tabarka">Tabarka</option>
                      <option value="Bizerte">Bizerte</option>
                      <option value="Mahdia">Mahdia</option>
                  </optgroup>
              </select>
          </div>

          <div class="col-xl-2 col-lg-4 col-md-6 px-2">
              <div class="date mb-3" id="dateLocationContainer" data-target-input="nearest">
                  <label for="dateLocation" class="form-label">Date de location</label>
                  <div class="input-group">
                      <input type="text" id="dateLocation" name="dateLocation"
                          class="form-control p-4 datetimepicker-input" placeholder="jj/mm/aaaa"
                          data-target="#dateLocationContainer" data-toggle="datetimepicker" min="" />
                      <div class="input-group-append">
                          <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-xl-2 col-lg-4 col-md-6 px-2">
              <div class="time mb-3" id="heureLocation" data-target-input="nearest">
                  <label for="heureLocation" class="form-label">Heure de location</label>
                  <input type="text" class="form-control p-4 datetimepicker-input" placeholder="hh:mm"
                      data-target="#heureLocation" data-toggle="datetimepicker" id="name" />
              </div>
          </div>

          <div class="col-xl-2 col-lg-4 col-md-6 px-2">
              <div class="date mb-3" id="dateRetourContainer" data-target-input="nearest">
                  <label for="dateRetour" class="form-label">Date de retour</label>
                  <div class="input-group">
                      <input type="text" class="form-control p-4 datetimepicker-input" placeholder="jj/mm/aaaa"
                          data-target="#dateRetourContainer" data-toggle="datetimepicker" id="dateRetour"
                          name="dateRetour" />
                      <div class="input-group-append">
                          <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-xl-2 col-lg-4 col-md-6 px-2">
              <div class="time mb-3" id="heureRetourContainer" data-target-input="nearest">
                  <label for="heureRetour" class="form-label">Heure de retour</label>
                  <input type="text" class="form-control p-4 datetimepicker-input" placeholder="hh:mm"
                      id="heureRetour" data-target="#heureRetourContainer" data-toggle="datetimepicker" />
              </div>
          </div>

          <div class="col-xl-2 col-lg-4 col-md-6 px-2 d-flex align-items-end">
              <button class="btn btn-primary btn-block mb-3" type="submit" style="height: 50px;">Rechercher</button>
          </div>
      </div>
      <div class="row mx-n2">
          <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" id="LieuRestitution" name="LieuRestitution"checked>
              <label class="custom-control-label" for="LieuRestitution">Lieu de restitution identique</label>
          </div>
      </div>
      <div id="LocRestitution" class="row mx-n2">
          <div class="col-xl-2 col-lg-4 col-md-6 px-2">
              <select class="custom-select px-4 mb-3" style="height: 50px;">
                  <option selected></option>
                  <optgroup label="Aéroports">
                      <option value="TUN">Aéroport Tunis Carthage</option>
                      <option value="NBE">Aéroport Enfidha</option>
                      <option value="MIR">Aéroport Monastir</option>
                      <option value="DJE">Aéroport Djerba</option>
                      <option value="TBJ">Aéroport Tozeur</option>
                  </optgroup>

                  <optgroup label="Centres-Villes">
                      <option value="Tunis">Tunis</option>
                      <option value="Hammamet">Hammamet</option>
                      <option value="Sousse">Sousse</option>
                      <option value="Monastir">Monastir</option>
                      <option value="Djerba">Djerba</option>
                      <option value="Kairouan">Kairouan</option>
                      <option value="Sfax">Sfax</option>
                      <option value="Tabarka">Tabarka</option>
                      <option value="Bizerte">Bizerte</option>
                      <option value="Mahdia">Mahdia</option>
                  </optgroup>
              </select>
          </div>
      </div>
      &nbsp
  </div>
  <!-- Search End -->
