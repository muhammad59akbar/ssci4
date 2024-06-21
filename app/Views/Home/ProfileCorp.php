<?= $this->extend('layout/UserTemplate'); ?>

<?= $this->section('content'); ?>


<div class="padding-custome">
    <div class="pt-2 mt-3" style="background-color: #DFDFDF;">
        <div class="py-4 bg-body-secondary">
            <div class="container">
                <div class="d-flex flex-column  align-items-center align-items-md-start text-center ">
                    <span>Profile</span>
                    <h1>PT. Corpec Inspeksi Utama</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-3 my-5">
        <img src="<?= base_url('assets/images/banner_corpec.png') ?>" alt="Profil Corpec Inspeksi Utama" class="img-fluid p-2 w-100">
        <div class="row mt-3">
            <div class="col-md-8 text-start">

                <div class="pb-2">
                    <h1><span class="text-primary">About</span> <span class="text-dark">Corpec</span></h1>
                    <p>Corpec is a company that one of its services is a specialist in
                        Engineering, Industrial Inspection and Consumer Testing Service
                        at Pharmaceutical, Cosmetic, Food & Beverage, Chemical
                        Industry, Energy and Apparel Industries.</p>
                    <p>With a long and wide experiences, our experts team come from
                        various engineering background knowledge such as
                        Chemical/Process, Mechanical, Electrical & Automation, Oil &
                        Gas inspection, and Apparel inspection with experiences in that
                        industry over 3 years and supported by skilled Purchasing &
                        Finance Dept.</p>
                    <p>At Corpec Inspeksi Utama, we strive to deliver high quality,
                        reliable products, and problem solving for helping our customers
                        succeed in their production activity.</p>
                    <p>Following these, we enclosed the documents as a description of
                        our scope and capability through the business.</p>
                </div>
                <hr>
                <div class="mt-3 pb-2 text-center">
                    <h2>Vision</h2>
                    <p>Being the best inspection and consultant service company in
                        Indonesia with professional expert, qualified and reliable.
                    </p>
                    <h2 class="text-primary">Mission</h2>
                    <p>Provide high quality assurance, product feasibility,
                        compliance standard with the aim to satisfy the
                        manufacturers and consumers. Increase the economic value,
                        increase the product safety standard, and create a conducive
                        working atmosphere to achieve long-term business.</p>
                </div>
                <hr>
                <div class="mt-3 pb-2 text-center">
                    <img src="<?= base_url('assets/images/history_corpec.png') ?>" alt="" class="img-fluid p-2 w-100">
                    <h1><span class="text-primary">Corpec</span> <span class="text-dark">History</span></h1>

                    <p>Corpec (PT Corpec Inspeksi Utama) was founded in 2015 and has operated since
                        then with an aim to be company capable of making a positive impact for
                        customers, employees and its surroundings.

                    </p>
                    <p>In order to realize our goal, we recognize the importance of implementing new
                        strategies for potential growth in national stage.
                    </p>
                    <p>With more than 3 years of experience in the engineering and industrial inspection,
                        our company continuously innovating our processes to stay competitive and
                        maintain our standing as a trusted Consultant Engineering and Inspection
                        company in Indonesia.</p>

                </div>
                <div class="flex p-2 mb-2 border border-primary">
                    <div class="row">
                        <div class="col-sm-2 d-flex justify-content-center align-items-center">
                            <div class="p-3 bg-primary">
                                <span class="text-white fw-bold">2015</span>
                            </div>
                        </div>
                        <div class="col-md-10 p-3 ">
                            <div class="  p-2">
                                <p>
                                    PT. Corpec Inspeksi Utama was found in Jakarta, Indonesia
                                    by Daniel Ardhianto, with less than twenty employees. Corpec
                                    doing business with Pertamina as vendor for pipeline and tank
                                    inspection and a specialist in Engineering & Manufacturing
                                    Project at Pharmaceutical, Cosmetic, Food & Beverage, and
                                    Chemical Industry.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2 d-flex justify-content-center align-items-center">
                            <div class="p-3 bg-primary">
                                <span class="text-white fw-bold">2016</span>
                            </div>
                        </div>
                        <div class="col-md-10 p-3">
                            <div class=" p-2">
                                <p>
                                    Further growth in PLN, Indonesia Power and Petro Energy as
                                    vendor for Eddy Current test of PLTU and SKPP certification.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2 d-flex justify-content-center align-items-center">
                            <div class="p-3 bg-primary">
                                <span class="text-white fw-bold">2017</span>
                            </div>
                        </div>
                        <div class="col-md-10 p-3 ">
                            <div class="  p-2">
                                <p>
                                    Corpec expands its service to do Social Compliance, GOTS
                                    and OCS consultancy, Higg Index Consultancy, C-TPAT
                                    Consultancy, Environment Management System, Chemical
                                    Management System, Technical and Consumer Goods
                                    Inspection and perform it in several garment companies and
                                    buying agency in Indonesia.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2 d-flex justify-content-center align-items-center">
                            <div class="p-3 bg-primary">
                                <span class="text-white fw-bold">2018</span>
                            </div>
                        </div>
                        <div class="col-md-10 p-3">
                            <div class="  p-2">
                                <p>
                                    Certified ISO 9001:2015 Quality Management System
                                </p>
                            </div>
                        </div>
                    </div>


                </div>



            </div>
            <div class="col-lg-4">
                <div class="border border-primary text-white bg-primary p-3 rounded">
                    <h4>Contact Information</h4>
                    <hr>
                    <div class="d-flex">
                        <div class="flex-shrink-0">
                            <i class="bi bi-telephone-fill fs-4 me-2"></i>
                        </div>
                        <div class="flex-grow-1">
                            <p class="mt-2">+62 1234567890</p>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="flex-shrink-0">
                            <i class="bi bi-envelope-fill fs-4 me-2"></i>
                        </div>
                        <div class="flex-grow-1">
                            <p class="mt-2">admin@corpec.co.id</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-start">
                        <div class="flex-shrink-0">
                            <i class="bi bi-geo-alt-fill fs-4 me-2"></i>
                        </div>
                        <div class="flex-grow-1">
                            <p class="mt-2 mb-1 fw-bold">Head Office</p>
                            <p class="mb-0">Jl. Penjernihan Dalam No.46<br>
                                Pejompongan, Jakarta Pusat<br>
                                DKI Jakarta 10210 - Indonesia</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-start">
                        <div class="flex-shrink-0">
                            <i class="bi bi-geo-alt-fill fs-4 me-2"></i>
                        </div>
                        <div class="flex-grow-1">
                            <p class="mt-2 mb-1 fw-bold">Operational Office</p>
                            <p class="mb-0">Jl. Sirsak – H. Usman RT 001/002 No.
                                32B, Jagakarsa, Jakarta Selatan, DKI
                                Jakarta 12620
                        </div>
                    </div>



                </div>


            </div>
        </div>
    </div>

</div>




<?= $this->endSection(); ?>