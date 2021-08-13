
         @foreach($storages as $storage)

           <div class="select-color">
                <input type="radio" name="storage" class="hidden" id="{{$storage->id}}">
                <label class="color" for="{{$storage->id}}">
                    {{$storage->storage}}
                </label>
                </div>

         @endforeach