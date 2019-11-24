{{-- layout style-1 from layouts --}}
@extends('layouts.mylayout')

@section('title', 'NRI Group Challenge')

@section('content')

    <div class="row p-2">

        <div class="col">
            <div class="row">
             
                <div class="col-12">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="nav-inventory-tab" data-toggle="tab" href="#nav-inventory" role="tab" aria-controls="nav-inventory" aria-selected="true">Import & Search Tab</a>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-inventory" role="tabpanel" aria-labelledby="nav-inventory-tab">
                                    <div class="row mt-2">
                                        <div class="col">
                                            <form action=" {{ url('/import') }} " method="post" enctype="multipart/form-data" >
                                                <div class="row mt-2">
                                                    <div class="col">
                                                        <h5>Import lot items</h5>
                                                    </div>
                                                </div>
                                                @if(session()->has('message'))
                                                    <div class="alert alert-success">
                                                        {{ session()->get('message') }}
                                                    </div>
                                                @endif
                                                @if(count($errors) > 0)
                                                    <div class="alert alert-danger">
                                                        Upload Validation Error<br><br>
                                                        <ul>
                                                            @foreach($errors->all() as $error)
                                                                <li>{{ $error }}</li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                @endif
                                            <div class="custom-file">
                                                <label class="custom-upload-file" for="customFile">
                                                    <i class="fas fa-upload" style="font-size:52px;"></i>
                                                    <h5>Upload file to import</h5>
                                                    <small style="font-size:10px;">File must be in the following xsl,.xslx or .csv format</small>
                                                    <input type="file" class="custom-file-input" id="customFile" name="import_file">
                                                </label>
                                            </div> <br>
                                            <button type="submit" class="btn btn-primary btn-block mt-5">
                                                <i class="fas fa-file-import"></i>
                                                Import
                                            </button> <br>
                                            {{ csrf_field() }}
                                            </form>
                                        </div>
                                        <div class="col">

                                            <form action=" {{ route('search') }}" method="get" id= "search_result">
                                                <div class="row mt-2">
                                                    <div class="col">
                                                        <h5>Search</h5>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <label for="timeline">Select Timeline</label>
                                                        <select name="timeline" id="timeline" class="form-control">
                                                            <option value="0">Select...</option>
                                                            <option value="M">Monthly</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <label for="category">Select Category</label>
                                                        <select name="category" id="search_category" class="form-control">
                                                            @php $categories = App\InventoryCategory::all(); @endphp
                                                            <option value="0">Select...</option>
                                                            @if($categories)
                                                                @foreach($categories as $category)
                                                                    <option value=" {{ $category->id }} "> {{ $category->nri_category }} </option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                                                        <label for="">&nbsp;</label>
                                                        <button type="submit" id="search" class="btn btn-dark btn-block btn-submit"><i class="fas fa-search-dollar"></i> Search</button>
                                                    </div>
                                                </div>
                                            </form>
                                        
                                        </div>
                                    </div>
                                  
                                    <div class="row mt-2">
                                        <div class="col">
                                                @if(session()->has('search_result') && session()->has('category'))
                                                    @php
                                                        $category = session()->get('category');
                                                        $find_category_name = App\InventoryCategory::find($category);
                                                        $category_name = $find_category_name->nri_category;
                                                        $data = session()->get('search_result');
                                                        $total = 0;
                                                    @endphp
                                                    <table class="table">
                                                        <thead class="thead-dark">
                                                            <tr>
                                                                <th scope="col">Category</th>
                                                                <th scope="col">Month</th>
                                                                <th scope="col">Expense</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($data as $item)
                                                                <tr>
                                                                    <td> {{ ucwords($category_name) }} </td>
                                                                    <td> {{ $item->month }}-{{ $item->year }} </td>
                                                                    <td> {{ $item->sum }} </td>
                                                                    @php $total += $item->sum;  @endphp
                                                                </tr>
                                                            @endforeach
                                                                <tr>
                                                                    <td colspan="2"><b>Total</b></td>
                                                                    <td> {{ $total }}</td>
                                                                </tr>
                                                        </tbody>
                                                    </table>
                                                @elseif(session()->has('search_result'))
                                                    @php
                                                        $data = session()->get('search_result');
                                                        $total = 0;
                                                    @endphp
                                                    <table class="table">
                                                        <thead class="thead-dark">
                                                            <tr>
                                                                <th scope="col">Month</th>
                                                                <th scope="col">Expense</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($data as $item)
                                                                <tr>
                                                                    <td> {{ $item->month }}-{{ $item->year }} </td>
                                                                    <td> {{ $item->sum }} </td>
                                                                    @php $total += $item->sum;  @endphp
                                                                </tr>
                                                            @endforeach
                                                                <tr>
                                                                    <td> <b>Total Expense</b> </td>
                                                                    <td> {{ $total }}</td>
                                                                </tr>
                                                        </tbody>
                                                    </table>
                                                @endif
                                        </div>
                                    </div>
                                 
                                </div>
                                </div>
                            </div>
                        </div>
                       
                        <div class="tab-pane fade" id="v-pills-reports" role="tabpanel" aria-labelledby="v-pills-reports-tab">
                        </div>
                   
                    </div>
                </div>
              </div>
        </div>
    </div>

@endsection

@section('footer_content')

<script type="text/javascript">

    // Vlidation js for search form.
    $('.btn-submit').click(function(event){

        event.preventDefault();

        var time = $('#timeline').val();
        var category = $('#search_category').val();
        if(time == 0 && category == 0){
                alert('Select Minimum one filter to search');
            return false;
        }else{
            if(time == 0){
                alert('Time line is required');
                return false;
            }else{
                $("#search_result").submit();
            }
        }
    });

</script>

@endsection
