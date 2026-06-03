<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Dynamic Grid</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="d-flex justify-content-between mb-3">
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#configModal"> Configure Columns  </button>
    <a href="{{ url('/download-excel') }}" class="btn btn-success">Download Excel</a>
</div>

<div id="loader" class="text-center my-3" style="display:none;">
    <div class="spinner-border text-primary" role="status"> <span class="visually-hidden">Loading...</span> </div>
</div>

<div id="gridContainer"> @include('records.grid')</div>
<div class="modal fade" id="configModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Grid Configuration</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                @foreach($columns as $column)
                    <div class="form-check form-switch mb-2">
                        <input class="form-check-input column-toggle" type="checkbox" value="{{ $column }}"
                            {{ ($visibleColumns[$column] ?? true) ? 'checked' : '' }}>
                        <label class="form-check-label">
                            {{ ucwords(str_replace('_',' ',$column)) }}
                        </label>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
</body>
</html>

<script>

let timer;

$(document).on('change','.column-toggle',function(){

    let columns = [];

    $('.column-toggle').each(function(){

        columns.push({
            column: $(this).val(),
            visible: $(this).is(':checked') ? 1 : 0
        });

    });

    $.ajax({

        url: "{{ url('/save-config') }}",
        method: "POST",

        data: {
            columns: columns,
            _token: $('meta[name="csrf-token"]').attr('content')
        },

        success: function(){

            filterGrid();

            let modalEl =
                document.getElementById('configModal');

            let modal =
                bootstrap.Modal.getInstance(modalEl);

            modal.hide();

        }

    });

});


$(document).on('keyup','.filter',function(){

    clearTimeout(timer);

    timer = setTimeout(function(){

        filterGrid();

    },500);

});


$(document).on('click','.expand-row',function(){

    let id = $(this).data('id');

    let detailRow = $('#detail-'+id);

    if(detailRow.is(':visible'))
    {
        detailRow.hide();
        return;
    }

    $('.detail-row').hide();

    $.ajax({

        url:'/record/details/'+id,

        success:function(html){

            detailRow
                .show()
                .find('td')
                .html(html);

        }

    });

});


function filterGrid()
{
    $.ajax({

        url:'/records/filter',

        data: $('.filter').serialize(),

        beforeSend:function(){

            $('#loader').show();

        },

        success:function(response){

            $('#gridContainer').html(response);

        },

        complete:function(){

            $('#loader').hide();

        }

    });
}

</script>