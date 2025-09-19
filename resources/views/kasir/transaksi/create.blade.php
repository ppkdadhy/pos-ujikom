@extends('app')
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="card-title">Create Transaction</div>
        </div>
        <div class="card-body">
            <form action="" method="post">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <label for="" class="form-label">Order Code</label>
                        <input type="text" class="form-control" name="order_code" value="{{ $orderCode }}" readonly>
                    </div>
                    <div class="col-6">
                        <label for="" class="form-label">Order Date</label>
                        <input type="text" class="form-control" name="order_date" value="{{ $today }}" readonly>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <label for="" class="form-label">Status Order</label>
                        <input type="text" class="form-control text-primary fw-bold" value="{{ $statusOrder }}"
                            readonly>
                    </div>
                    <div class="col-6 d-flex align-items-center mt-2">
                        <button type="button" class="btn btn-primary" id="counterBtn">Click Order</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <table class="table table-bordered mt-2">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Products</th>
                                    <th>Qty</th>
                                    <th>Order Price</th>
                                    <th>Order Subtotal</th>
                                    <th>Cancel Order</th>
                                </tr>
                            </thead>
                            <tbody id="dataTransactions">
                            </tbody>
                        </table>
                        <button type="submit" class="btn btn-primary">ADD Orders</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const counterBtn = document.querySelector('#counterBtn');
            const dataTransactions = document.querySelector('#dataTransactions');
            let no = 1;
            const products = @json($products);

            function updateNo() {
                const rows = dataTransactions.querySelectorAll("tr");
                rows.forEach((row, index) => {
                    row.cells[0].textContent = index + 1;
                });
            }

            counterBtn.addEventListener('click', function() {
                let newRow = "<tr>";
                newRow += `<td>${no++}</td>`;
                newRow += "<td><select class='form-select product-select' name='product_id[]'>";
                newRow += "<option value='' data-price='0'>--Choose Product--</option>";
                products.forEach(product => {
                    newRow +=
                        `<option value="${product.id}" data-price="${product.product_price}">${product.product_name}</option>`;
                });

                newRow += "</select></td>";
                newRow += `<td><input class='form-control qty' type='number' name='qty[]'></td>`;
                newRow +=
                    `<td><input class='form-control order_price' type='number' name='order_price[]' readonly></td>`;
                newRow +=
                    `<td><input class='form-control order_subtotal' type='number' name='order_subtotal[]' readonly></td>`;
                newRow +=
                    `<td><button type='button' class='btn btn-danger btn-sm cancel'>Cancel</button></td>`;
                newRow += "</tr>";
                dataTransactions.insertAdjacentHTML('beforeend', newRow);
                updateNo();
            });
            //fungsi untuk cancel:
            dataTransactions.addEventListener('click', function(e) {
                if (e.target.classList.contains('cancel')) {
                    e.target.closest('tr').remove();
                    updateNo();
                }
            });
            //untuk memasukan ke inputan order_price:
            dataTransactions.addEventListener('change', function(e) {
                if (e.target.classList.contains('product-select')) {
                    let selectOpt = e.target.options[e.target.selectedIndex];
                    let order_price = e.target.closest("tr").querySelector(".order_price");
                    order_price.value = selectOpt.getAttribute("data-price");
                }
            });
        });
    </script>
@endsection
