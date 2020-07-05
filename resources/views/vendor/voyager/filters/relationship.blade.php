
@if(isset($options->model) && isset($options->type))

    @if(class_exists($options->model))

        @php $relationshipField = $row->field; @endphp

        @if($options->type == 'belongsTo')

            @if(isset($view) && ($view == 'browse' || $view == 'read'))

                @php
                    $relationshipData = (isset($data)) ? $data : $dataTypeContent;
                    $model = app($options->model);
                    $query = $model::where($options->key,$relationshipData->{$options->column})->first();
                @endphp

                @if(isset($query))
                    <p>{{ $query->{$options->label} }}</p>
                @else
                    <p>{{ __('voyager::generic.no_results') }}</p>
                @endif

            @else

                <select
                    class="form-control select2-ajax" name="{{ $options->column }}"
                    data-get-items-route="{{route('voyager.' . $dataType->slug.'.relation')}}"
                    data-get-items-field="{{$row->field}}"
                    @if(!is_null($dataTypeContent->getKey())) data-id="{{$dataTypeContent->getKey()}}" @endif
                    data-method="{{ !is_null($dataTypeContent->getKey()) ? 'edit' : 'add' }}"
                >
                    @php
                        $model = app($options->model);
                        $query = $model::where($options->key, old($options->column, $dataTypeContent->{$options->column}))->get();
                    @endphp

                    @if(!$row->required)
                        <option value="">{{__('voyager::generic.none')}}</option>
                    @endif

                    @foreach($query as $relationshipData)
                        <option value="{{ $relationshipData->{$options->key} }}" @if(old($options->column, $dataTypeContent->{$options->column}) == $relationshipData->{$options->key}) selected="selected" @endif>{{ $relationshipData->{$options->label} }}</option>
                    @endforeach
                </select>

            @endif

        @elseif($options->type == 'hasOne')

            @php
                $relationshipData = (isset($data)) ? $data : $dataTypeContent;

                $model = app($options->model);
                $query = $model::where($options->column, '=', $relationshipData->{$options->key})->first();

            @endphp

            @if(isset($query))
                <p>{{ $query->{$options->label} }}</p>
            @else
                <p>{{ __('voyager::generic.no_results') }}</p>
            @endif

        @elseif($options->type == 'hasMany')

            @if(isset($view) && ($view == 'browse' || $view == 'read'))

                @php
                    $relationshipData = (isset($data)) ? $data : $dataTypeContent;
                    $model = app($options->model);
                  /*  $selected_values = $model::where($options->column, '=', $relationshipData->{$options->key})->get()->map(function ($item, $key) use ($options) {
                        return $item->{$options->label};
                    })->all(); */

                        $selected_values = $model::where($options->column, '=', $relationshipData->{$options->key})->get() ;
                        $selected_values->load('translations') ;
                        $fa ="";$en = "";
                       foreach ($selected_values as $f)
                        {
                            $json =  get_field_translations($f,'value');
                            $jsondecoded = json_decode($json);
                            $fa .=$jsondecoded->fa;$fa.=',';
                            $en .=$jsondecoded->en;$en.=',';
                       }
                       $value = array('fa' =>$fa , 'en' =>$en);
                     $encodedjson = json_encode($value);

                      // $string_values = implode(", ", $selected_values);
                       //if(mb_strlen($string_values) > 25){ $string_values = mb_substr($string_values, 0, 25) . '...'; }
                @endphp

                @if($view == 'browse')

                    @if(empty($selected_values))
                        <p>{{ __('voyager::generic.no_results') }}</p>
                    @else

                        <input type="hidden"
                               data-i18n="true"
                               name="{{ 'value'.$row->id }}_i18n"
                               id="{{ 'value'.$row->id }}_i18n"
                               value="{{ $encodedjson }}">
                       <p>{{$value['fa']}}</p>
                    @endif
                @else
                    @if(empty($selected_values))
                        <p>{{ __('voyager::generic.no_results') }}</p>
                    @else
                        <input type="hidden"
                               data-i18n="true"
                               name="{{ 'value'.$row->id }}_i18n"
                               id="{{ 'value'.$row->id }}_i18n"
                               value="{{ $encodedjson }}">
                            @php  $exteractedval = explode(',',$value['fa'])@endphp
                                <li> </li>
                    @endif
                @endif
            @else
                @php
                        $relationshipData = (isset($data)) ? $data : $dataTypeContent;
                        $model = app($options->model);
                        $selected_values = $model::where($options->column, '=', $relationshipData->{$options->key})->get() ;
                           $selected_values->load('translations') ;
                           $fa ="";$en = "";
                          foreach ($selected_values as $f)
                           {
                               $json =  get_field_translations($f,'value');
                               $jsondecoded = json_decode($json);
                               $fa .=$jsondecoded->fa."\n";
                               $en .=$jsondecoded->en."\n";
                          }
                          $value = array('fa' =>$fa , 'en' =>$en);
                        $encodedjson = json_encode($value);
                        //var_dump($encodedjson);

                @endphp
                <input type="hidden"
                       data-i18n="true"
                       name="{{'value'}}_i18n"
                       id="{{'value'}}_i18n"
                       @if(!empty(session()->getOldInput($row->field.'_i18n') && is_null($dataTypeContent->id)))
                       value="{{ session()->getOldInput($row->field.'_i18n') }}"
                       @else
                       value="{{ $encodedjson }}">
                      @php
                        $exteractedvaluefa = $value['fa'];
                        $array_exteracted_fa = explode(',' , $exteractedvaluefa);
                        echo "<span style='font-style:smal'></span>";
                       if(isset($array_exteracted_fa))
                           {
                               echo '<textarea class="form-control" rows="7" name=filtervalues>' ;
                                   foreach($array_exteracted_fa as $v)
                                       {
                                          echo $v;
                                         // echo "\n";
                                       }

                                   echo '</textarea>';

                           }
                       else
                           echo   "<p>". __('voyager::generic.no_results') ."</p>";
                @endphp
                @endif
            @endif
        @elseif($options->type == 'belongsToMany')

            @if(isset($view) && ($view == 'browse' || $view == 'read'))

                @php
                    $relationshipData = (isset($data)) ? $data : $dataTypeContent;

                    $selected_values = isset($relationshipData) ? $relationshipData->belongsToMany($options->model, $options->pivot_table, $options->foreign_pivot_key ?? null, $options->related_pivot_key ?? null, $options->parent_key ?? null, $options->key)->get()->map(function ($item, $key) use ($options) {
            			return $item->{$options->label};
            		})->all() : array();
                @endphp

                @if($view == 'browse')
                    @php
                        $string_values = implode(", ", $selected_values);
                        if(mb_strlen($string_values) > 25){ $string_values = mb_substr($string_values, 0, 25) . '...'; }
                    @endphp
                    @if(empty($selected_values))
                        <p>{{ __('voyager::generic.no_results') }}</p>
                    @else
                        <p>{{ $string_values }}</p>
                    @endif
                @else
                    @if(empty($selected_values))
                        <p>{{ __('voyager::generic.no_results') }}</p>
                    @else
                        <ul>
                            @foreach($selected_values as $selected_value)
                                <li>{{ $selected_value }}</li>
                            @endforeach
                        </ul>
                    @endif
                @endif
            @else
                <select
                    class="form-control @if(isset($options->taggable) && $options->taggable === 'on') select2-taggable @else select2-ajax @endif"
                    name="{{ $relationshipField }}[]" multiple
                    data-get-items-route="{{route('voyager.' . $dataType->slug.'.relation')}}"
                    data-get-items-field="{{$row->field}}"
                    @if(!is_null($dataTypeContent->getKey())) data-id="{{$dataTypeContent->getKey()}}" @endif
                    data-method="{{ !is_null($dataTypeContent->getKey()) ? 'edit' : 'add' }}"
                    @if(isset($options->taggable) && $options->taggable === 'on')
                        data-route="{{ route('voyager.'.\Illuminate\Support\Str::slug($options->table).'.store') }}"
                        data-label="{{$options->label}}"
                        data-error-message="{{__('voyager::bread.error_tagging')}}"
                    @endif
                >

                        @php
                            $selected_values = isset($dataTypeContent) ? $dataTypeContent->belongsToMany($options->model, $options->pivot_table, $options->foreign_pivot_key ?? null, $options->related_pivot_key ?? null, $options->parent_key ?? null, $options->key)->get()->map(function ($item, $key) use ($options) {
                                return $item->{$options->key};
                            })->all() : array();
                            $relationshipOptions = app($options->model)->all();
                        $selected_values = old($relationshipField, $selected_values);
                        @endphp

                        @if(!$row->required)
                            <option value="">{{__('voyager::generic.none')}}</option>
                        @endif

                        @foreach($relationshipOptions as $relationshipOption)
                            <option value="{{ $relationshipOption->{$options->key} }}" @if(in_array($relationshipOption->{$options->key}, $selected_values)) selected="selected" @endif>{{ $relationshipOption->{$options->label} }}</option>
                        @endforeach

                </select>

            @endif
        @endif
    @else

        cannot make relationship because {{ $options->model }} does not exist.
    @endif

@endif
