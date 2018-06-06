@extends('admin.index')
@section('big-name')
    Orientation Camps
@stop

@section('admin-content')
<div class="row">
    <div class="col-xs-12">
        @if(Session::has('sms'))
        <div class="alert alert-success">
           {{ Session::get('sms') }}
            <a href="#" data-dismiss="alert" class="close">×</a>
        </div>
        @endif
        <div class="alert alert-info">
            <strong>Info</strong>. 
            {{-- <a href="#" data-dismiss="alert" class="close">×</a> --}}
            <ul>
                <li style="list-style: none">Once an <strong>Orientation camp</strong> record is deleted, all <strong>routes</strong> that have that camp would also be deleted.</li>
            </ul>
        </div>
        @if(count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Error Alert</strong>. 
            <a href="#" data-dismiss="alert" class="close">×</a>
            <ul>
                @foreach($errors->all() as $error)
                    <li> {{ $error }} </li>
                @endforeach
            </ul>
        </div>
        @endif
        <span class="heady">
            <div class="form-actions">
                <a href="{{ route('camps.create') }}" type="submit" class="btn btn-success btn-sm">Add Camp</a>
            </div>
        </span>

        <div class="widget-box">
            <div class="widget-title">
                <h5>Orientation Camps</h5>
            </div>
            <div class="widget-content nopadding">
                <table class="table table-bordered table-striped table-hover with-check">
                    <thead>
                        <tr>
                            {{-- <th><i class="fa fa-resize-vertical"></i></th> --}}
                            {{-- <th>Column name</th> --}}
                            <th>#</th>
                            <th>Camp Name</th>
                            <th>Details</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($camps as $camp)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $camp->name }}</td>
                            <td>{{ $camp->details }}</td>
                            <td>
                                <div class="btn-group">
                                    <button data-toggle="dropdown" class="btn btn-xs btn-red dropdown-toggle">Options <span class="caret"></span></button>
                                    <ul class="dropdown-menu ">
                                        <li>
                                            <form method="POST" style=" display: inline; padding-left: 2.3rem" action="{{ route('camps.destroy', $camp->id) }}"
                                                onsubmit="return confirm('Are you sure?');">
                                            <input type="hidden" name="_method" value="DELETE">
                                            {{ csrf_field() }}

                                            <button class="btn btn-xs btn-danger">Delete</button>
                                            </form>
                                        </li>
                                    </ul>
                                </div> 
                            </td>
                        </tr>
                        @empty
                        <tr>
                            No Camps Listed yet.
                        </tr>
                        @endforelse
                    </tbody>
                </table>  
                {{--  --}}                          
            </div>
        </div>
        
    </div>
</div>

@stop


@section('admin-scripts')
    <script>
        $('.checkbox_all').click(function () {
            $('input.checkbox_delete').prop('checked', this.checked);
            getIds();
        });

        $('.checkbox_delete').change(function () {
            getIds();
        })

        function getIds()
        {
            var ids = [];
            $('.checkbox_delete').each(function () {
                if($(this).is(":checked")) {
                    ids.push($(this).val());
                }
            });

            $('#ids').val(ids.join());

        }
    </script>
@stop


