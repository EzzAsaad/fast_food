@extends('admin.layouts.app')
@section('content')
<div class="table-responsive">
                                <table class="table table-borderless table-striped table-vcenter" dir="rtl">
                                    <thead>
                                        <tr>
                                            <th class="text-center" style="width: 100px;">ID</th>
                                            <th class="d-none d-sm-table-cell text-center">Submitted</th>
                                            <th>Status</th>
                                            <th class="d-none d-xl-table-cell">Customer</th>
                                            <th class="d-none d-xl-table-cell text-center">Products</th>
                                            <th class="d-none d-sm-table-cell text-right">Value</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center font-size-sm">
                                                <a class="font-w600" href="be_pages_ecom_order.html">
                                                    <strong>ORD.00965</strong>
                                                </a>
                                            </td>
                                            <td class="d-none d-sm-table-cell text-center font-size-sm">27/01/2020</td>
                                            <td>
                                                <span class="badge badge-warning">Processing</span>
                                            </td>
                                            <td class="d-none d-xl-table-cell font-size-sm">
                                                <a class="font-w600" href="be_pages_ecom_customer.html">Wayne Garcia</a>
                                            </td>
                                            <td class="d-none d-xl-table-cell text-center font-size-sm">
                                                <a class="font-w600" href="be_pages_ecom_order.html">1</a>
                                            </td>
                                            <td class="d-none d-sm-table-cell text-right font-size-sm">
                                                <strong>$354,31</strong>
                                            </td>
                                            <td class="text-center">
                                                <a class="btn btn-sm btn-alt-secondary" href="be_pages_ecom_order.html" data-toggle="tooltip" title="View">
                                                    <i class="fa fa-fw fa-eye"></i>
                                                </a>
                                                <a class="btn btn-sm btn-alt-danger" href="javascript:void(0)" data-toggle="tooltip" title="Delete">
                                                    <i class="fa fa-fw fa-times text-danger"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center font-size-sm">
                                                <a class="font-w600" href="be_pages_ecom_order.html">
                                                    <strong>ORD.00964</strong>
                                                </a>
                                            </td>
                                            <td class="d-none d-sm-table-cell text-center font-size-sm">13/02/2020</td>
                                            <td>
                                                <span class="badge badge-danger">Canceled</span>
                                            </td>
                                            <td class="d-none d-xl-table-cell font-size-sm">
                                                <a class="font-w600" href="be_pages_ecom_customer.html">Jesse Fisher</a>
                                            </td>
                                            <td class="d-none d-xl-table-cell text-center font-size-sm">
                                                <a class="font-w600" href="be_pages_ecom_order.html">4</a>
                                            </td>
                                            <td class="d-none d-sm-table-cell text-right font-size-sm">
                                                <strong>$201,46</strong>
                                            </td>
                                            <td class="text-center">
                                                <a class="btn btn-sm btn-alt-secondary" href="be_pages_ecom_order.html" data-toggle="tooltip" title="View">
                                                    <i class="fa fa-fw fa-eye"></i>
                                                </a>
                                                <a class="btn btn-sm btn-alt-danger" href="javascript:void(0)" data-toggle="tooltip" title="Delete">
                                                    <i class="fa fa-fw fa-times text-danger"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center font-size-sm">
                                                <a class="font-w600" href="be_pages_ecom_order.html">
                                                    <strong>ORD.00963</strong>
                                                </a>
                                            </td>
                                            <td class="d-none d-sm-table-cell text-center font-size-sm">12/12/2020</td>
                                            <td>
                                                <span class="badge badge-success">Delivered</span>
                                            </td>
                                            <td class="d-none d-xl-table-cell font-size-sm">
                                                <a class="font-w600" href="be_pages_ecom_customer.html">Amber Harvey</a>
                                            </td>
                                            <td class="d-none d-xl-table-cell text-center font-size-sm">
                                                <a class="font-w600" href="be_pages_ecom_order.html">1</a>
                                            </td>
                                            <td class="d-none d-sm-table-cell text-right font-size-sm">
                                                <strong>$1619,29</strong>
                                            </td>
                                            <td class="text-center">
                                                <a class="btn btn-sm btn-alt-secondary" href="be_pages_ecom_order.html" data-toggle="tooltip" title="View">
                                                    <i class="fa fa-fw fa-eye"></i>
                                                </a>
                                                <a class="btn btn-sm btn-alt-danger" href="javascript:void(0)" data-toggle="tooltip" title="Delete">
                                                    <i class="fa fa-fw fa-times text-danger"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center font-size-sm">
                                                <a class="font-w600" href="be_pages_ecom_order.html">
                                                    <strong>ORD.00962</strong>
                                                </a>
                                            </td>
                                            <td class="d-none d-sm-table-cell text-center font-size-sm">17/05/2020</td>
                                            <td>
                                                <span class="badge badge-warning">Processing</span>
                                            </td>
                                            <td class="d-none d-xl-table-cell font-size-sm">
                                                <a class="font-w600" href="be_pages_ecom_customer.html">Brian Stevens</a>
                                            </td>
                                            <td class="d-none d-xl-table-cell text-center font-size-sm">
                                                <a class="font-w600" href="be_pages_ecom_order.html">8</a>
                                            </td>
                                            <td class="d-none d-sm-table-cell text-right font-size-sm">
                                                <strong>$1216,92</strong>
                                            </td>
                                            <td class="text-center">
                                                <a class="btn btn-sm btn-alt-secondary" href="be_pages_ecom_order.html" data-toggle="tooltip" title="View">
                                                    <i class="fa fa-fw fa-eye"></i>
                                                </a>
                                                <a class="btn btn-sm btn-alt-danger" href="javascript:void(0)" data-toggle="tooltip" title="Delete">
                                                    <i class="fa fa-fw fa-times text-danger"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center font-size-sm">
                                                <a class="font-w600" href="be_pages_ecom_order.html">
                                                    <strong>ORD.00961</strong>
                                                </a>
                                            </td>
                                            <td class="d-none d-sm-table-cell text-center font-size-sm">23/04/2020</td>
                                            <td>
                                                <span class="badge badge-info">For delivery</span>
                                            </td>
                                            <td class="d-none d-xl-table-cell font-size-sm">
                                                <a class="font-w600" href="be_pages_ecom_customer.html">Wayne Garcia</a>
                                            </td>
                                            <td class="d-none d-xl-table-cell text-center font-size-sm">
                                                <a class="font-w600" href="be_pages_ecom_order.html">6</a>
                                            </td>
                                            <td class="d-none d-sm-table-cell text-right font-size-sm">
                                                <strong>$1591,17</strong>
                                            </td>
                                            <td class="text-center">
                                                <a class="btn btn-sm btn-alt-secondary" href="be_pages_ecom_order.html" data-toggle="tooltip" title="View">
                                                    <i class="fa fa-fw fa-eye"></i>
                                                </a>
                                                <a class="btn btn-sm btn-alt-danger" href="javascript:void(0)" data-toggle="tooltip" title="Delete">
                                                    <i class="fa fa-fw fa-times text-danger"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center font-size-sm">
                                                <a class="font-w600" href="be_pages_ecom_order.html">
                                                    <strong>ORD.00960</strong>
                                                </a>
                                            </td>
                                            <td class="d-none d-sm-table-cell text-center font-size-sm">22/05/2020</td>
                                            <td>
                                                <span class="badge badge-success">Delivered</span>
                                            </td>
                                            <td class="d-none d-xl-table-cell font-size-sm">
                                                <a class="font-w600" href="be_pages_ecom_customer.html">Ralph Murray</a>
                                            </td>
                                            <td class="d-none d-xl-table-cell text-center font-size-sm">
                                                <a class="font-w600" href="be_pages_ecom_order.html">7</a>
                                            </td>
                                            <td class="d-none d-sm-table-cell text-right font-size-sm">
                                                <strong>$1512,29</strong>
                                            </td>
                                            <td class="text-center">
                                                <a class="btn btn-sm btn-alt-secondary" href="be_pages_ecom_order.html" data-toggle="tooltip" title="View">
                                                    <i class="fa fa-fw fa-eye"></i>
                                                </a>
                                                <a class="btn btn-sm btn-alt-danger" href="javascript:void(0)" data-toggle="tooltip" title="Delete">
                                                    <i class="fa fa-fw fa-times text-danger"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center font-size-sm">
                                                <a class="font-w600" href="be_pages_ecom_order.html">
                                                    <strong>ORD.00959</strong>
                                                </a>
                                            </td>
                                            <td class="d-none d-sm-table-cell text-center font-size-sm">07/09/2020</td>
                                            <td>
                                                <span class="badge badge-warning">Processing</span>
                                            </td>
                                            <td class="d-none d-xl-table-cell font-size-sm">
                                                <a class="font-w600" href="be_pages_ecom_customer.html">Jesse Fisher</a>
                                            </td>
                                            <td class="d-none d-xl-table-cell text-center font-size-sm">
                                                <a class="font-w600" href="be_pages_ecom_order.html">8</a>
                                            </td>
                                            <td class="d-none d-sm-table-cell text-right font-size-sm">
                                                <strong>$911,33</strong>
                                            </td>
                                            <td class="text-center">
                                                <a class="btn btn-sm btn-alt-secondary" href="be_pages_ecom_order.html" data-toggle="tooltip" title="View">
                                                    <i class="fa fa-fw fa-eye"></i>
                                                </a>
                                                <a class="btn btn-sm btn-alt-danger" href="javascript:void(0)" data-toggle="tooltip" title="Delete">
                                                    <i class="fa fa-fw fa-times text-danger"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center font-size-sm">
                                                <a class="font-w600" href="be_pages_ecom_order.html">
                                                    <strong>ORD.00958</strong>
                                                </a>
                                            </td>
                                            <td class="d-none d-sm-table-cell text-center font-size-sm">22/04/2020</td>
                                            <td>
                                                <span class="badge badge-warning">Processing</span>
                                            </td>
                                            <td class="d-none d-xl-table-cell font-size-sm">
                                                <a class="font-w600" href="be_pages_ecom_customer.html">Melissa Rice</a>
                                            </td>
                                            <td class="d-none d-xl-table-cell text-center font-size-sm">
                                                <a class="font-w600" href="be_pages_ecom_order.html">3</a>
                                            </td>
                                            <td class="d-none d-sm-table-cell text-right font-size-sm">
                                                <strong>$1695,91</strong>
                                            </td>
                                            <td class="text-center">
                                                <a class="btn btn-sm btn-alt-secondary" href="be_pages_ecom_order.html" data-toggle="tooltip" title="View">
                                                    <i class="fa fa-fw fa-eye"></i>
                                                </a>
                                                <a class="btn btn-sm btn-alt-danger" href="javascript:void(0)" data-toggle="tooltip" title="Delete">
                                                    <i class="fa fa-fw fa-times text-danger"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center font-size-sm">
                                                <a class="font-w600" href="be_pages_ecom_order.html">
                                                    <strong>ORD.00957</strong>
                                                </a>
                                            </td>
                                            <td class="d-none d-sm-table-cell text-center font-size-sm">06/05/2020</td>
                                            <td>
                                                <span class="badge badge-danger">Canceled</span>
                                            </td>
                                            <td class="d-none d-xl-table-cell font-size-sm">
                                                <a class="font-w600" href="be_pages_ecom_customer.html">Danielle Jones</a>
                                            </td>
                                            <td class="d-none d-xl-table-cell text-center font-size-sm">
                                                <a class="font-w600" href="be_pages_ecom_order.html">5</a>
                                            </td>
                                            <td class="d-none d-sm-table-cell text-right font-size-sm">
                                                <strong>$39,18</strong>
                                            </td>
                                            <td class="text-center">
                                                <a class="btn btn-sm btn-alt-secondary" href="be_pages_ecom_order.html" data-toggle="tooltip" title="View">
                                                    <i class="fa fa-fw fa-eye"></i>
                                                </a>
                                                <a class="btn btn-sm btn-alt-danger" href="javascript:void(0)" data-toggle="tooltip" title="Delete">
                                                    <i class="fa fa-fw fa-times text-danger"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center font-size-sm">
                                                <a class="font-w600" href="be_pages_ecom_order.html">
                                                    <strong>ORD.00956</strong>
                                                </a>
                                            </td>
                                            <td class="d-none d-sm-table-cell text-center font-size-sm">22/01/2020</td>
                                            <td>
                                                <span class="badge badge-warning">Processing</span>
                                            </td>
                                            <td class="d-none d-xl-table-cell font-size-sm">
                                                <a class="font-w600" href="be_pages_ecom_customer.html">Carol White</a>
                                            </td>
                                            <td class="d-none d-xl-table-cell text-center font-size-sm">
                                                <a class="font-w600" href="be_pages_ecom_order.html">5</a>
                                            </td>
                                            <td class="d-none d-sm-table-cell text-right font-size-sm">
                                                <strong>$2031,15</strong>
                                            </td>
                                            <td class="text-center">
                                                <a class="btn btn-sm btn-alt-secondary" href="be_pages_ecom_order.html" data-toggle="tooltip" title="View">
                                                    <i class="fa fa-fw fa-eye"></i>
                                                </a>
                                                <a class="btn btn-sm btn-alt-danger" href="javascript:void(0)" data-toggle="tooltip" title="Delete">
                                                    <i class="fa fa-fw fa-times text-danger"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center font-size-sm">
                                                <a class="font-w600" href="be_pages_ecom_order.html">
                                                    <strong>ORD.00955</strong>
                                                </a>
                                            </td>
                                            <td class="d-none d-sm-table-cell text-center font-size-sm">26/06/2020</td>
                                            <td>
                                                <span class="badge badge-warning">Processing</span>
                                            </td>
                                            <td class="d-none d-xl-table-cell font-size-sm">
                                                <a class="font-w600" href="be_pages_ecom_customer.html">Marie Duncan</a>
                                            </td>
                                            <td class="d-none d-xl-table-cell text-center font-size-sm">
                                                <a class="font-w600" href="be_pages_ecom_order.html">6</a>
                                            </td>
                                            <td class="d-none d-sm-table-cell text-right font-size-sm">
                                                <strong>$1129,53</strong>
                                            </td>
                                            <td class="text-center">
                                                <a class="btn btn-sm btn-alt-secondary" href="be_pages_ecom_order.html" data-toggle="tooltip" title="View">
                                                    <i class="fa fa-fw fa-eye"></i>
                                                </a>
                                                <a class="btn btn-sm btn-alt-danger" href="javascript:void(0)" data-toggle="tooltip" title="Delete">
                                                    <i class="fa fa-fw fa-times text-danger"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center font-size-sm">
                                                <a class="font-w600" href="be_pages_ecom_order.html">
                                                    <strong>ORD.00954</strong>
                                                </a>
                                            </td>
                                            <td class="d-none d-sm-table-cell text-center font-size-sm">15/09/2020</td>
                                            <td>
                                                <span class="badge badge-success">Delivered</span>
                                            </td>
                                            <td class="d-none d-xl-table-cell font-size-sm">
                                                <a class="font-w600" href="be_pages_ecom_customer.html">Alice Moore</a>
                                            </td>
                                            <td class="d-none d-xl-table-cell text-center font-size-sm">
                                                <a class="font-w600" href="be_pages_ecom_order.html">1</a>
                                            </td>
                                            <td class="d-none d-sm-table-cell text-right font-size-sm">
                                                <strong>$1789,18</strong>
                                            </td>
                                            <td class="text-center">
                                                <a class="btn btn-sm btn-alt-secondary" href="be_pages_ecom_order.html" data-toggle="tooltip" title="View">
                                                    <i class="fa fa-fw fa-eye"></i>
                                                </a>
                                                <a class="btn btn-sm btn-alt-danger" href="javascript:void(0)" data-toggle="tooltip" title="Delete">
                                                    <i class="fa fa-fw fa-times text-danger"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center font-size-sm">
                                                <a class="font-w600" href="be_pages_ecom_order.html">
                                                    <strong>ORD.00953</strong>
                                                </a>
                                            </td>
                                            <td class="d-none d-sm-table-cell text-center font-size-sm">28/02/2020</td>
                                            <td>
                                                <span class="badge badge-danger">Canceled</span>
                                            </td>
                                            <td class="d-none d-xl-table-cell font-size-sm">
                                                <a class="font-w600" href="be_pages_ecom_customer.html">Marie Duncan</a>
                                            </td>
                                            <td class="d-none d-xl-table-cell text-center font-size-sm">
                                                <a class="font-w600" href="be_pages_ecom_order.html">7</a>
                                            </td>
                                            <td class="d-none d-sm-table-cell text-right font-size-sm">
                                                <strong>$431,30</strong>
                                            </td>
                                            <td class="text-center">
                                                <a class="btn btn-sm btn-alt-secondary" href="be_pages_ecom_order.html" data-toggle="tooltip" title="View">
                                                    <i class="fa fa-fw fa-eye"></i>
                                                </a>
                                                <a class="btn btn-sm btn-alt-danger" href="javascript:void(0)" data-toggle="tooltip" title="Delete">
                                                    <i class="fa fa-fw fa-times text-danger"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center font-size-sm">
                                                <a class="font-w600" href="be_pages_ecom_order.html">
                                                    <strong>ORD.00952</strong>
                                                </a>
                                            </td>
                                            <td class="d-none d-sm-table-cell text-center font-size-sm">09/06/2020</td>
                                            <td>
                                                <span class="badge badge-danger">Canceled</span>
                                            </td>
                                            <td class="d-none d-xl-table-cell font-size-sm">
                                                <a class="font-w600" href="be_pages_ecom_customer.html">Amanda Powell</a>
                                            </td>
                                            <td class="d-none d-xl-table-cell text-center font-size-sm">
                                                <a class="font-w600" href="be_pages_ecom_order.html">1</a>
                                            </td>
                                            <td class="d-none d-sm-table-cell text-right font-size-sm">
                                                <strong>$1075,65</strong>
                                            </td>
                                            <td class="text-center">
                                                <a class="btn btn-sm btn-alt-secondary" href="be_pages_ecom_order.html" data-toggle="tooltip" title="View">
                                                    <i class="fa fa-fw fa-eye"></i>
                                                </a>
                                                <a class="btn btn-sm btn-alt-danger" href="javascript:void(0)" data-toggle="tooltip" title="Delete">
                                                    <i class="fa fa-fw fa-times text-danger"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center font-size-sm">
                                                <a class="font-w600" href="be_pages_ecom_order.html">
                                                    <strong>ORD.00951</strong>
                                                </a>
                                            </td>
                                            <td class="d-none d-sm-table-cell text-center font-size-sm">09/03/2020</td>
                                            <td>
                                                <span class="badge badge-success">Delivered</span>
                                            </td>
                                            <td class="d-none d-xl-table-cell font-size-sm">
                                                <a class="font-w600" href="be_pages_ecom_customer.html">Jeffrey Shaw</a>
                                            </td>
                                            <td class="d-none d-xl-table-cell text-center font-size-sm">
                                                <a class="font-w600" href="be_pages_ecom_order.html">1</a>
                                            </td>
                                            <td class="d-none d-sm-table-cell text-right font-size-sm">
                                                <strong>$47,68</strong>
                                            </td>
                                            <td class="text-center">
                                                <a class="btn btn-sm btn-alt-secondary" href="be_pages_ecom_order.html" data-toggle="tooltip" title="View">
                                                    <i class="fa fa-fw fa-eye"></i>
                                                </a>
                                                <a class="btn btn-sm btn-alt-danger" href="javascript:void(0)" data-toggle="tooltip" title="Delete">
                                                    <i class="fa fa-fw fa-times text-danger"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center font-size-sm">
                                                <a class="font-w600" href="be_pages_ecom_order.html">
                                                    <strong>ORD.00950</strong>
                                                </a>
                                            </td>
                                            <td class="d-none d-sm-table-cell text-center font-size-sm">16/07/2020</td>
                                            <td>
                                                <span class="badge badge-success">Delivered</span>
                                            </td>
                                            <td class="d-none d-xl-table-cell font-size-sm">
                                                <a class="font-w600" href="be_pages_ecom_customer.html">Scott Young</a>
                                            </td>
                                            <td class="d-none d-xl-table-cell text-center font-size-sm">
                                                <a class="font-w600" href="be_pages_ecom_order.html">7</a>
                                            </td>
                                            <td class="d-none d-sm-table-cell text-right font-size-sm">
                                                <strong>$512,19</strong>
                                            </td>
                                            <td class="text-center">
                                                <a class="btn btn-sm btn-alt-secondary" href="be_pages_ecom_order.html" data-toggle="tooltip" title="View">
                                                    <i class="fa fa-fw fa-eye"></i>
                                                </a>
                                                <a class="btn btn-sm btn-alt-danger" href="javascript:void(0)" data-toggle="tooltip" title="Delete">
                                                    <i class="fa fa-fw fa-times text-danger"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center font-size-sm">
                                                <a class="font-w600" href="be_pages_ecom_order.html">
                                                    <strong>ORD.00949</strong>
                                                </a>
                                            </td>
                                            <td class="d-none d-sm-table-cell text-center font-size-sm">03/12/2020</td>
                                            <td>
                                                <span class="badge badge-info">For delivery</span>
                                            </td>
                                            <td class="d-none d-xl-table-cell font-size-sm">
                                                <a class="font-w600" href="be_pages_ecom_customer.html">Amber Harvey</a>
                                            </td>
                                            <td class="d-none d-xl-table-cell text-center font-size-sm">
                                                <a class="font-w600" href="be_pages_ecom_order.html">4</a>
                                            </td>
                                            <td class="d-none d-sm-table-cell text-right font-size-sm">
                                                <strong>$44,81</strong>
                                            </td>
                                            <td class="text-center">
                                                <a class="btn btn-sm btn-alt-secondary" href="be_pages_ecom_order.html" data-toggle="tooltip" title="View">
                                                    <i class="fa fa-fw fa-eye"></i>
                                                </a>
                                                <a class="btn btn-sm btn-alt-danger" href="javascript:void(0)" data-toggle="tooltip" title="Delete">
                                                    <i class="fa fa-fw fa-times text-danger"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center font-size-sm">
                                                <a class="font-w600" href="be_pages_ecom_order.html">
                                                    <strong>ORD.00948</strong>
                                                </a>
                                            </td>
                                            <td class="d-none d-sm-table-cell text-center font-size-sm">09/06/2020</td>
                                            <td>
                                                <span class="badge badge-warning">Processing</span>
                                            </td>
                                            <td class="d-none d-xl-table-cell font-size-sm">
                                                <a class="font-w600" href="be_pages_ecom_customer.html">Amber Harvey</a>
                                            </td>
                                            <td class="d-none d-xl-table-cell text-center font-size-sm">
                                                <a class="font-w600" href="be_pages_ecom_order.html">3</a>
                                            </td>
                                            <td class="d-none d-sm-table-cell text-right font-size-sm">
                                                <strong>$502,44</strong>
                                            </td>
                                            <td class="text-center">
                                                <a class="btn btn-sm btn-alt-secondary" href="be_pages_ecom_order.html" data-toggle="tooltip" title="View">
                                                    <i class="fa fa-fw fa-eye"></i>
                                                </a>
                                                <a class="btn btn-sm btn-alt-danger" href="javascript:void(0)" data-toggle="tooltip" title="Delete">
                                                    <i class="fa fa-fw fa-times text-danger"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center font-size-sm">
                                                <a class="font-w600" href="be_pages_ecom_order.html">
                                                    <strong>ORD.00947</strong>
                                                </a>
                                            </td>
                                            <td class="d-none d-sm-table-cell text-center font-size-sm">23/08/2020</td>
                                            <td>
                                                <span class="badge badge-info">For delivery</span>
                                            </td>
                                            <td class="d-none d-xl-table-cell font-size-sm">
                                                <a class="font-w600" href="be_pages_ecom_customer.html">Jack Greene</a>
                                            </td>
                                            <td class="d-none d-xl-table-cell text-center font-size-sm">
                                                <a class="font-w600" href="be_pages_ecom_order.html">8</a>
                                            </td>
                                            <td class="d-none d-sm-table-cell text-right font-size-sm">
                                                <strong>$412,76</strong>
                                            </td>
                                            <td class="text-center">
                                                <a class="btn btn-sm btn-alt-secondary" href="be_pages_ecom_order.html" data-toggle="tooltip" title="View">
                                                    <i class="fa fa-fw fa-eye"></i>
                                                </a>
                                                <a class="btn btn-sm btn-alt-danger" href="javascript:void(0)" data-toggle="tooltip" title="Delete">
                                                    <i class="fa fa-fw fa-times text-danger"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- END All Orders Table -->

@endsection