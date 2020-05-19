@extends('vendor.layouts.vendordashboard')
@section('pageTitle', 'Vendor Dashboard | GTZ Online Shop')

@section('content')
@endsection
<section class="main order-listing">
    <div class="container">
      <h5 class="text-center heading">Orders List</h5>
    </div>
    <div class="container">
      <table class="table table-hover">
        <thead>
          <tr>
            <th>s/n</th>
            <th>Product Name</th>
            <th>Quantity</th>
            <th>Customer</th>
            <th>Status</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td class="ellipsis" data-maxlength="80">
              Lenovo Flex 14 2-in-1 Convertible Laptop, 14 Inch FHD
              Touchscreen Display, AMD Ryzen 5 3500U Processor, 12GB DDR4
              RAM,256GB NVMe SSD, Windows 10, 81SS000DUS, Black, Pen Included
              4.4out of 5 stars 1,439
            </td>
            <td data-name="quantity:">10 pcs</td>
            <td data-name="customer:">Mary Doe</td>
            <td data-name="status:">Pending</td>
            <td>
              <a href="vieworderproduct" class="btn btn-success"
                >View order</a
              >
              <button class="btn btn-danger">Delete</button>
            </td>
          </tr>
          <tr>
            <td>2</td>
            <td class="ellipsis" data-maxlength="80">
              Lenovo Flex 14 2-in-1 Convertible Laptop, 14 Inch FHD
              Touchscreen Display, AMD Ryzen 5 3500U Processor, 12GB DDR4 RAM,
              256GB NVMe SSD, Windows 10, 81SS000DUS, Black, Pen Included 4.4
              out of 5 stars 1,439
            </td>
            <td data-name="quantity:">10 pcs</td>
            <td data-name="customer:">Mary Doe</td>
            <td data-name="status:">Pending</td>
            <td>
              <a href="vieworderproduct" class="btn btn-success"
                >View order</a
              >
              <button class="btn btn-danger">Delete</button>
            </td>
          </tr>
          <tr>
            <td>3</td>
            <td class="ellipsis" data-maxlength="80">
              Lenovo Flex 14 2-in-1 Convertible Laptop, 14 Inch FHD
              Touchscreen Display, AMD Ryzen 5 3500U Processor, 12GB DDR4 RAM,
              256GB NVMe SSD, Windows 10, 81SS000DUS, Black, Pen Included 4.4
              out of 5 stars 1,439
            </td>
            <td data-name="quantity:">10 pcs</td>
            <td data-name="customer:">Mary Doe</td>
            <td data-name="status:">Pending</td>
            <td>
              <a href="vieworderproduct" class="btn btn-success"
                >View order</a
              >
              <button class="btn btn-danger">Delete</button>
            </td>
          </tr>
          <tr>
            <td>4</td>
            <td class="ellipsis" data-maxlength="80">
              Lenovo Flex 14 2-in-1 Convertible Laptop, 14 Inch FHD
              Touchscreen Display, AMD Ryzen 5 3500U Processor, 12GB DDR4 RAM,
              256GB NVMe SSD, Windows 10, 81SS000DUS, Black, Pen Included 4.4
              out of 5 stars 1,439
            </td>
            <td data-name="quantity:">10 pcs</td>
            <td data-name="customer:">Mary Doe</td>
            <td data-name="status:">Pending</td>
            <td>
              <a href="vieworderproduct" class="btn btn-success"
                >View order</a
              >
              <button class="btn btn-danger">Delete</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </section>
  @endsection