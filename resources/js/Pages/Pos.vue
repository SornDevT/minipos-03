<template>
    <div>
        <div class="breadcrumb-header justify-content-between">
					<div class="left-content">
						<div>
						  <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">ຂາຍໜ້າຮ້ານ POS</h2>
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
			<div class="col-md-8">
				<div class="card">
					<div class="card-body">
						<input type="text" class="form-control"  placeholder="ຄົ້ນຫາສິນຄ້າ...">
					</div>
				</div>
				<div class="row" style="height: 67vh; overflow: auto;">
					<div class="col-md-3" v-for="list in DataProduct.data" :key="list.id" >
								<div class="card cursor-pointer" @click="AddToOrder(list.id)">
								<span v-for="li in ListOrder" :key="li.id">
									<div class="box-item" v-if="list.id == li.id" > {{ li.order_amount }} </div>	
								</span>
								<img v-if="list.images" class="img-fluid card-img-top" :src="'assets/img/'+list.images" style="width:100%; height: 140px; object-fit: cover; object-position: center;">
								<img v-if="!list.images" class="img-fluid card-img-top" :src="'assets/img/no_image.jpg'" style="width:100%; height: 140px; object-fit: cover; object-position: center;">
								<div class="card-body text-center p-1">
									<p class="card-text mb-0">{{ list.name }}</p>
									<p class="card-text text-info"> {{ formatPrice(list.price_sell) }} ກີບ </p>
								</div>
							</div>
					</div>
					
					
				</div>
			</div>
			<div class="col-md-4">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title text-info d-flex justify-content-between">
							<span> <strong>ລວມຍອດເງິນ: </strong> </span>
							<span> <strong> {{ formatPrice(TotalAmount) }} ກີບ</strong> </span>
						</h4>
						<button type="button"  class="btn btn-success text-white mb-2" style="width: 100%" >
                            <i class="mdi mdi-currency-usd"></i> ຊຳລະເງິນ
                        </button>
						<div class=" table-responsive" style="height: 65vh; overflow: auto">
							<table class="table table-bordered mg-b-0 text-md-nowrap border">
										<thead>
											<tr>
												<th>ລາຍການ</th>
												<th>ລາຄາ</th>
												<th>ຍອດລວມ</th>
											</tr>
										</thead>
										<tbody>
											<tr v-for="item in ListOrder" :key="item.id">
												<td> {{item.name}} </td>
												<td class=" text-right"> {{ formatPrice(item.price_sell) }} <br>
														<i class="fa fa-minus-circle cursor-pointer text-warning" @click="DelOne(item.id)"></i> {{ item.order_amount }} <i class="fa fa-plus-circle cursor-pointer text-info" @click="AddOne(item.id)"></i> |  <i class="fa fa-times-circle cursor-pointer text-danger" @click="DelOneList(item.id)"></i>
												 </td>
												<td class=" text-right">{{ formatPrice(item.price_sell * item.order_amount) }}</td>
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
    name: 'MyWebAppPos',

    data() {
        return {
            DataProduct:[],
			SearchProduct:'',
			ListOrder:[],
        };
    },

    mounted() {
        
    },
	computed:{
		TotalAmount(){
			return this.ListOrder.reduce((num, item) => num + (item.price_sell * item.order_amount), 0)
		}
	},

    methods: {
		AddOne(id){
		
			let item = this.DataProduct.data.find((i)=>i.id==id);
			let list_order = this.ListOrder.find((i)=>i.id==id);

			//console.log(list_order)

			if(list_order){

				let old_order_amount = list_order.order_amount;
				if(item.amount - old_order_amount>0){
					list_order.order_amount = old_order_amount+1;
				} else {
					alert('ສີນຄ້າໝົດ');
				}
			}

		},
		DelOne(id){

			if(this.ListOrder.find((i)=>i.id==id)){
				let old_order_amount = this.ListOrder.find((i)=>i.id==id).order_amount;
						
				if(old_order_amount-1>0){
					this.ListOrder.find((i)=>i.id==id).order_amount = old_order_amount-1;
				} else {
					this.ListOrder.splice(this.ListOrder.map(i=>i.id).indexOf(id),1);
				}
			}

		},
		DelOneList(id){
				this.ListOrder.splice(this.ListOrder.map(i=>i.id).indexOf(id),1);
		},
		AddToOrder(id){

				let item = this.DataProduct.data.find((i)=>i.id==id);

				let list_order = this.ListOrder.find((i)=>i.id==id);

				if(list_order){
					let old_order_amount = list_order.order_amount;
					if(item.amount - old_order_amount>0){
							if(this.ListOrder.find((i)=>i.id==id)){
								this.ListOrder.find((i)=>i.id==id).order_amount++;
							} else {
								this.ListOrder.push({
									id: item.id,
									name: item.name,
									price_sell: item.price_sell,
									order_amount: 1
								});
							}
					} else {
						alert('ສີນຄ້າໝົດ');
					}
				} else {

					if(this.ListOrder.find((i)=>i.id==id)){
							this.ListOrder.find((i)=>i.id==id).order_amount++;
							} else {
								this.ListOrder.push({
									id: item.id,
									name: item.name,
									price_sell: item.price_sell,
									order_amount: 1
								});
							}
				}
				

				
				
		},
		GetStore(page){
			this.$axios.get("/sanctum/csrf-cookie").then((response)=>{
				this.$axios.get(`/api/store?page=${page}&search=${this.SearchProduct}`)
				.then((response)=>{
						this.DataProduct = response.data;
				}).catch((error)=>{
					console.log(error);
				})
			});

		},
		formatPrice(value) {
			let val = (value / 1).toFixed(0).replace(",", ".");
			return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
		},
        
    },
	created(){
		this.GetStore();
	},
	beforeRouteEnter(to, from, next){
			if(!window.Laravel.isLoggedin_laravel){
				window.location.href = "/login";
			}

			next();
	}
};
</script>

<style >
.box-item{
	position: absolute;
    right: 0;
    background-color: blue;
    color: white;
    font-weight: bold;
    padding: 5px;
    border-radius: 0px 0px 0px 10px;
}
</style>