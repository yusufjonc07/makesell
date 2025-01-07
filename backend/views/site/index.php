<?php

use yii\helpers\Url;
use dosamigos\chartjs\ChartJs;

/** @var yii\web\View $this */

$this->title = 'Dashboard';

?>
<div class="site-index">

    <div class="container pt-4">

        <!--Section: Minimal statistics cards-->
        <section>
            <div class="row">
                <div class="col-xl-3 col-sm-6 col-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between px-md-1">
                                <div>
                                    <h3 class="text-danger d-flex align-items-center">
                                        <svg width="30" height="30" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M9 10.5L11 12.5L15.5 8M20 21V7.8C20 6.11984 20 5.27976 19.673 4.63803C19.3854 4.07354 18.9265 3.6146 18.362 3.32698C17.7202 3 16.8802 3 15.2 3H8.8C7.11984 3 6.27976 3 5.63803 3.32698C5.07354 3.6146 4.6146 4.07354 4.32698 4.63803C4 5.27976 4 6.11984 4 7.8V21L6.75 19L9.25 21L12 19L14.75 21L17.25 19L20 21Z"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                        <?= $invoices ?>
                                    </h3>
                                    </h3>
                                    <p class="mb-0">New Invoices</p>
                                </div>
                                <div class="align-self-center">
                                    <i class="fas fa-rocket text-danger fa-3x"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between px-md-1">
                                <div>
                                    <h3 class="text-success d-flex align-items-center">
                                        <svg width="30" height="30" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M12 15.5H7.5C6.10444 15.5 5.40665 15.5 4.83886 15.6722C3.56045 16.06 2.56004 17.0605 2.17224 18.3389C2 18.9067 2 19.6044 2 21M19 21V15M16 18H22M14.5 7.5C14.5 9.98528 12.4853 12 10 12C7.51472 12 5.5 9.98528 5.5 7.5C5.5 5.01472 7.51472 3 10 3C12.4853 3 14.5 5.01472 14.5 7.5Z"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                        <?= $clients ?>
                                    </h3>
                                    <p class="mb-0">New Clients</p>
                                </div>
                                <div class="align-self-center">
                                    <i class="far fa-user text-success fa-3x"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between px-md-1">
                                <div>
                                    <h3 class="text-warning d-flex align-items-center">
                                        <svg width="30" height="30" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M20 20V13M12 20V10M4 20L4 16M13.4067 5.0275L18.5751 6.96567M10.7988 5.40092L5.20023 9.59983M21.0607 6.43934C21.6464 7.02513 21.6464 7.97487 21.0607 8.56066C20.4749 9.14645 19.5251 9.14645 18.9393 8.56066C18.3536 7.97487 18.3536 7.02513 18.9393 6.43934C19.5251 5.85355 20.4749 5.85355 21.0607 6.43934ZM5.06066 9.43934C5.64645 10.0251 5.64645 10.9749 5.06066 11.5607C4.47487 12.1464 3.52513 12.1464 2.93934 11.5607C2.35355 10.9749 2.35355 10.0251 2.93934 9.43934C3.52513 8.85355 4.47487 8.85355 5.06066 9.43934ZM13.0607 3.43934C13.6464 4.02513 13.6464 4.97487 13.0607 5.56066C12.4749 6.14645 11.5251 6.14645 10.9393 5.56066C10.3536 4.97487 10.3536 4.02513 10.9393 3.43934C11.5251 2.85355 12.4749 2.85355 13.0607 3.43934Z"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                        <?= Yii::$app->formatter->asPercent($rate, 2); ?>
                                    </h3>
                                    <p class="mb-0">Production Rate</p>
                                </div>
                                <div class="align-self-center">
                                    <i class="fas fa-chart-pie text-warning fa-3x"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between px-md-1">
                                <div>
                                    <h3 class="text-info  d-flex align-items-center"><svg width="30" height="30"
                                            viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M18 15.8369C19.4559 16.5683 20.7041 17.742 21.6152 19.2096C21.7956 19.5003 21.8858 19.6456 21.917 19.8468C21.9804 20.2558 21.7008 20.7585 21.3199 20.9204C21.1325 21 20.9216 21 20.5 21M16 11.5322C17.4817 10.7959 18.5 9.26686 18.5 7.5C18.5 5.73314 17.4817 4.20411 16 3.46776M14 7.5C14 9.98528 11.9852 12 9.49996 12C7.01468 12 4.99996 9.98528 4.99996 7.5C4.99996 5.01472 7.01468 3 9.49996 3C11.9852 3 14 5.01472 14 7.5ZM2.55919 18.9383C4.1535 16.5446 6.66933 15 9.49996 15C12.3306 15 14.8464 16.5446 16.4407 18.9383C16.79 19.4628 16.9646 19.725 16.9445 20.0599C16.9289 20.3207 16.7579 20.64 16.5495 20.7976C16.2819 21 15.9138 21 15.1776 21H3.82232C3.08613 21 2.71804 21 2.4504 20.7976C2.24201 20.64 2.07105 20.3207 2.05539 20.0599C2.03529 19.725 2.20992 19.4628 2.55919 18.9383Z"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>423</h3>
                                    <p class="mb-0">Visits</p>
                                </div>
                                <div class="align-self-center">
                                    <i class="far fa-life-ring text-info fa-3x"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
        <!--Section: Minimal statistics cards-->

        <!-- Section: Main chart -->
        <section class="mb-4">
            <div class="card">
                <div class="card-header py-3">
                    <h5 class="mb-0 text-center"><strong>Main statistics chart</strong></h5>
                </div>
                <div class="card-body">
                    <?= ChartJs::widget([
                        'type' => 'bar',
                        'options' => [
                            'width' => 400,
                            'height' => 200,
                        ],
                        'data' => [
                            'labels' => ["January", "February", "March", "April", "May", "June", "July"],
                            'datasets' => $datasets,
                        ]
                    ]);
                    ?>
                </div>
            </div>
        </section>
        <!-- Section: Main chart -->
        <section>

            <div class="row">
                <div class="col-xl-3 col-sm-6 col-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between px-md-1">
                                <div>
                                    <h3 class="text-info">278</h3>
                                    <p class="mb-0">New Posts</p>
                                </div>
                                <div class="align-self-center">
                                    <i class="fas fa-book-open text-info fa-3x"></i>
                                </div>
                            </div>
                            <div class="px-md-1">
                                <div class="progress mt-3 mb-1 rounded" style="height: 7px">
                                    <div class="progress-bar bg-info" role="progressbar" style="width: 80%"
                                        aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between px-md-1">
                                <div>
                                    <h3 class="text-warning">156</h3>
                                    <p class="mb-0">New Comments</p>
                                </div>
                                <div class="align-self-center">
                                    <i class="far fa-comments text-warning fa-3x"></i>
                                </div>
                            </div>
                            <div class="px-md-1">
                                <div class="progress mt-3 mb-1 rounded" style="height: 7px">
                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 35%"
                                        aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between px-md-1">
                                <div>
                                    <h3 class="text-success">64.89 %</h3>
                                    <p class="mb-0">Bounce Rate</p>
                                </div>
                                <div class="align-self-center">
                                    <i class="fas fa-mug-hot text-success fa-3x"></i>
                                </div>
                            </div>
                            <div class="px-md-1">
                                <div class="progress mt-3 mb-1 rounded" style="height: 7px">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 60%"
                                        aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between px-md-1">
                                <div>
                                    <h3 class="text-danger">423</h3>
                                    <p class="mb-0">Total Visits</p>
                                </div>
                                <div class="align-self-center">
                                    <i class="fas fa-map-signs text-danger fa-3x"></i>
                                </div>
                            </div>
                            <div class="px-md-1">
                                <div class="progress mt-3 mb-1 rounded" style="height: 7px">
                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 40%"
                                        aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!--Section: Statistics with subtitles-->
        <section>
            <div class="row">
                <div class="col-xl-6 col-md-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between p-md-1">
                                <div class="d-flex flex-row">
                                    <div class="align-self-center">
                                        <i class="fas fa-pencil-alt text-info fa-3x me-4"></i>
                                    </div>
                                    <div>
                                        <h4>Total Posts</h4>
                                        <p class="mb-0">Monthly blog posts</p>
                                    </div>
                                </div>
                                <div class="align-self-center">
                                    <h2 class="h1 mb-0">18,000</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-md-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between p-md-1">
                                <div class="d-flex flex-row">
                                    <div class="align-self-center">
                                        <i class="far fa-comment-alt text-warning fa-3x me-4"></i>
                                    </div>
                                    <div>
                                        <h4>Total Comments</h4>
                                        <p class="mb-0">Monthly blog posts</p>
                                    </div>
                                </div>
                                <div class="align-self-center">
                                    <h2 class="h1 mb-0">84,695</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6 col-md-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between p-md-1">
                                <div class="d-flex flex-row">
                                    <div class="align-self-center">
                                        <h2 class="h1 mb-0 me-4">$76,456.00</h2>
                                    </div>
                                    <div>
                                        <h4>Total Sales</h4>
                                        <p class="mb-0">Monthly Sales Amount</p>
                                    </div>
                                </div>
                                <div class="align-self-center">
                                    <i class="far fa-heart text-danger fa-3x"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-md-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between p-md-1">
                                <div class="d-flex flex-row">
                                    <div class="align-self-center">
                                        <h2 class="h1 mb-0 me-4">$36,000.00</h2>
                                    </div>
                                    <div>
                                        <h4>Total Cost</h4>
                                        <p class="mb-0">Monthly Cost</p>
                                    </div>
                                </div>
                                <div class="align-self-center">
                                    <i class="fas fa-wallet text-success fa-3x"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Section: Statistics with subtitles-->
    </div>