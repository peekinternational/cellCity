          @foreach($models as $model)

          <div>
            <div class="single-answer-component-wrapper model">
              <div class="fade-on-mount normal-elemnt-active">
                <button class="answer-content" onclick="getrepairTypes('{{$model->id}}')" ><label for="{{$model->model_name}}">{{$model->model_name}}</label></button>
                <!-- <input type="radio" id="{{$model->model_name}}"  name="phone_model" class="hidden"> -->
              </div>
            </div>
          </div>

          @endforeach