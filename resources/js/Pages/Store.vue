<template>
    <div>
        <div class="breadcrumb-header justify-content-between">
					<div class="left-content">
						<div>
						  <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">ສະຕ໋ອກສິນຄ້າ</h2>
						  <p class="mg-b-0">Sales monitoring dashboard template.</p>
						</div>
					</div>
					<div class="main-dashboard-header-right">
						<div>
							<label class="tx-13">Customer Ratings</label>
							<div class="main-star">
								<i class="typcn typcn-star active"></i> <i class="typcn typcn-star active"></i> <i class="typcn typcn-star active"></i> <i class="typcn typcn-star active"></i> <i class="typcn typcn-star"></i> <span>(14,873)</span>
							</div>
						</div>
						<div>
							<label class="tx-13">Online Sales</label>
							<h5>563,275</h5>
						</div>
						<div>
							<label class="tx-13">Offline Sales</label>
							<h5>783,675</h5>
						</div>
					</div>
				</div>
        <div class="row">
					<div class="col-sm-12 col-lg-6 col-xl-3">
						<div class="card card-img-holder">
							<div class="card-body list-icons">
								<div class="clearfix">
									<div class="float-end  mt-2">
										<span class="text-primary ">
											<i class="si si-basket-loaded tx-30"></i>
										</span>
									</div>
									<div class="float-start text-end">
										<p class="card-text text-muted mb-1">Services</p>
										<h3>$124</h3>
									</div>
								</div>
								<div class="card-footer p-0">
									<p class="text-muted mb-0 pt-4"><i class="si si-arrow-down-circle text-warning me-1-20  me-2" aria-hidden="true"></i>Daily Orders</p>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-12 col-lg-6 col-xl-3">
						<div class="card card-img-holder">
							<div class="card-body list-icons">
								<div class="clearfix">
									<div class="float-end  mt-2">
										<span class="text-primary ">
											<i class="si si-credit-card tx-30"></i>
										</span>
									</div>
									<div class="float-start">
										<p class="card-text text-muted mb-1">Sources</p>
										<h3>$124</h3>
									</div>
								</div>
								<div class="card-footer p-0">
									<p class="text-muted mb-0 pt-4"><i class="si si-arrow-up-circle text-success me-2"></i>Less Sales</p>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-12 col-lg-6 col-xl-3">
						<div class="card card-img-holder">
							<div class="card-body list-icons">
								<div class="clearfix">
									<div class="float-end  mt-2">
										<span class="text-primary">
											<i class="si si-chart tx-30"></i>
										</span>
									</div>
									<div class="float-start">
										<p class="card-text text-muted mb-1">Income</p>
										<h3>21%</h3>
									</div>
								</div>
								<div class="card-footer p-0">
									<p class="text-muted mb-0 pt-4"><i class="si si-exclamation text-info me-2"></i>From
										Last Month</p>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-12 col-lg-6 col-xl-3">
						<div class="card card-img-holder">
							<div class="card-body list-icons">
								<div class="clearfix">
									<div class="float-end  mt-2">
										<span class="text-primary">
											<i class="si si-social-facebook tx-30"></i>
										</span>
									</div>
									<div class="float-start">
										<p class="card-text text-muted mb-1">Followers</p>
										<h3>24K</h3>
									</div>
								</div>
								<div class="card-footer p-0">
									<p class="text-muted mb-0 pt-4"><i class="si si-check me-1 text-primary me-2"></i>
										Recent History</p>
								</div>
							</div>
						</div>
					</div>
					

                    <div class="col-xl-12">
						<div class="card mg-b-20">
							<div class="card-header pb-0">
								<div class="d-flex justify-content-between">
									<h4 class="mg-b-0"> ລາຍການ ສ໋ອກສິນຄ້າ</h4>
                                    <span >
                                        <button class="btn btn-info-gradient new-btn mx-1" v-if="!FormShow" @click="add_product()" >ເພີ່ມໃໝ່</button>
                                        <button class="btn btn-success-gradient new-btn mx-1" v-if="FormShow" >ບັນທຶກ</button>
                                        <button class="btn btn-danger-gradient new-btn mx-1" v-if="FormShow" @click="cancel_product()" >ຍົກເລີກ</button>
                                    </span>
								</div>
								<p class="tx-12 tx-gray-500 mb-2">Example of Valex Bordered Table.. <a href="">Learn
										more</a></p>
							</div>
							<div class="card-body"> {{FormProduct}}
                                <div class="row" v-if="FormShow" >
                                    <div class="col-md-3">
                                            aa
                                    </div>
                                    <div class="col-md-9">
                                            <div class="form-group">
												<label for="product_name">ຊື່ສິນຄ້າ</label>
												<input type="email" class="form-control" id="product_name" v-model="FormProduct.name" placeholder="ປ້ອນຊື່ສິນຄ້າ...">
											</div>
                                            <div class="form-group">
												<label for="product_amount">ຈຳນວນ</label>
												<input type="email" class="form-control" id="product_amount" v-model="FormProduct.amount" placeholder="ປ້ອນຈຳນວນສິນຄ້າ...">
											</div>

                                        <div class="row">

                                        
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="product_buy">ລາຄາຊື້</label>
                                                    <input type="email" class="form-control" id="product_buy" v-model="FormProduct.price_buy" placeholder="ປ້ອນລາຄາຊື້...">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="product_sell">ລາຄາຂາຍ</label>
                                                    <input type="email" class="form-control" id="product_sell" v-model="FormProduct.price_sell" placeholder="ປ້ອນລາຄາຂາຍ...">
                                                </div>
                                            </div>
                                            </div>
                                    </div>
                                </div>

								<div class="table-responsive" v-if="!FormShow" > 
									<table class="table table-bordered mg-b-0 text-md-nowrap">
										<thead>
											<tr>
												<th>ID</th>
												<th>ຊື່ສິນຄ້າ</th>
												<th>ຈຳນວນ</th>
												<th>ລາຄາຊື້</th>
												<th class=" text-center">ຈັດການ</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<th scope="row">1</th>
												<td>Joan Powell</td>
												<td>Associate Developer</td>
												<td>$450,870</td>
												<td class=" text-center">
                                                    <div class="btn-icon-list justify-content-center">
                                                        <button class="btn btn-primary btn-icon"> <i class="fa fa-edit"></i> </button>
                                                        <button class="btn btn-danger btn-icon"><i class="far fa-trash-alt"></i></button>
                                                    </div>
                                                </td>
											</tr>
											<tr>
												<th scope="row">2</th>
												<td>Gavin Gibson</td>
												<td>Account manager</td>
												<td>$230,540</td>
												<td>$230,540</td>
											</tr>
											<tr>
												<th scope="row">3</th>
												<td>Julian Kerr</td>
												<td>Senior Javascript Developer</td>
												<td>$55,300</td>
												<td>$55,300</td>
											</tr>
											<tr>
												<th scope="row">4</th>
												<td>Cedric Kelly</td>
												<td>Accountant</td>
												<td>$234,100</td>
												<td>$234,100</td>
											</tr>
											<tr>
												<th scope="row">5</th>
												<td>Samantha May</td>
												<td>Junior Technical Author</td>
												<td>$43,198</td>
												<td>$43,198</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					
					
				</div>
    </div>
</template>

<script>
export default {
    name: 'MyWebAppStore',

    data() {
        return {
            FormShow: false,
            FormProduct:{
                name:"",
                amount:"",
                price_buy:"",
                price_sell:""
            }
        };
    },

    mounted() {
        
    },

    methods: {
        add_product(){
            this.FormShow = true
        },
        cancel_product(){
            this.FormShow = false
        }
    },
};
</script>

<style lang="scss" scoped>

</style>