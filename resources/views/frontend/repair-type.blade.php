          @foreach($RepairTypes as $type)
          <input type="hidden" name="model_Id" form="repairType" value="{{$type->model_Id}}">
          <div>
            <div class="fade-on-mount normal-elemnt-active">
              <button class="multiple-answer-component-wrapper">
                <label class="custom_check" onclick="custom_check()">
                  <div class="selection-inidicator">
                    <input type="checkbox" form="repairType" name="repair_type[]" value="{{$type->id}}">
                    <span class="checkmark"></span>
                  </div>
                  <div class="answer-content">{{$type->repair_type}}<span class="price">+(${{$type->price}})</span></div>
                </label>
              </button>
            </div>
          </div>

          @endforeach