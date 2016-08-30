Data yang didefinisikan selama proses pengembangan:

Product
Id	Name		Price	Picture			Stock	Rating
1	Lux			2000	Lux.jpg			20		star5.jpg
2	Pepsodent	4000	Pepsodent.jpg	15		star4.jpg
3	Sunlight	7500	Sunlight.jpg	10		star5.jpg
4	Indomie		2500	Indomie.jpg		15		star3.png
5	Rinso		15000	Rinso.jpg		5		star4.jpg
6	Tropical	25000	Tropical.jpg	5		star5.jpg
7	Sariwangi	6000	Sariwangi.jpg	1		star5.jpg
8	Kapal Api	9000	Kapalapi.jpg	1		star3.png
9	Marlboro	50000	Marlboro.jpg	0		star5.jpg
10	Popmie		3500	Popmie.jpg		0		star4.jpg

Coupon
Id	Name					Startdate	Finishdate	Nominal	Discount	Picture			Total	Status
1	September Special Gift	2016-07-01	2016-07-31	100000		0		Voucher1.jpg	5		0
2	Hypermart Voucher		2016-08-01	2016-09-30	50000		0		Voucher2.jpg	10		0
3	Kupon Majalah			2016-08-01	2016-09-30	0			30		Voucher3.jpg	5		0
4	Kupon Diskon 15%		2016-08-01	2016-09-30	0			15		Voucher4.png	10		0
5	Voucher 100.000			2016-08-01	2016-09-30	100000		0		Voucher5.jpg	0		0

Bank
Id	Name
1	Bank Mandiri
2	Bank BNI
3	Bank BRI
4	Bank BCA
5	Bank Permata

Shipping
Id	Name
1	JNE
2	Tiki
3	Pos

Ordering
Id	Name	Pid		Picture		Total		Price 

Transaction
Id	Name	Phone	Email	Address 	OrderCus	Total	Pembayaran		Shipping	Status

Requirement yang diminta:

1. Order transaction involves the following actors: customer and admin.
	-> untuk mengakses halaman customer terdapat pada base_url yaitu http://localhost/salestock/ kemudian jika ingin 
		mengubah role sebagai admin dapat mengklik button admin yang berada dipojok kanan atas. Ketika sudah berada 
		di halaman admin untuk berpindah sebagai customer kembali dapat mengklik button customer yang berada di pojok
		kanan atas.
2. Product dictionary → free to define product metadata and values as necessary, can be hardcoded,
	-> dibuat tabel product dari definisi database diatas
	- Product has quantity; product with quantity 0 can not be ordered
		-> kuantitas product merupakan kolom stock pada table product
3. Coupon dictionary → free to define coupon metadata and values as necessary, can be hardcoded
	-> dibuat tabel coupon dari definisi database diatas
	- Coupon has certain date range validity and quantity
		-> date range validity terdapat pada kolom Startdate dan Finishdate pada tabel Coupon. Quantity terdapat pada
			kolom total pada tabel Coupon
	- Coupon has certain amount of discount, can be percentage or nominal
		-> terdapat dua jenis kupon yaitu discount atau potongan persen dan nominal atau potongan harga yang terdapat 
			pada kolom discount dan nominal pada tabel Coupon
	- Coupon can be applied to order before submission
		-> untuk memilih kupon yang ingin digunakan dapat dilakukan di halaman My Order
4. Order transaction process flow and verification; single transaction has the following steps:
	- Customer can add product to an order
		-> caranya dengan user mengklik order pada product dan total product yang ingin dibeli pada halaman Products
	- Customer can apply one coupon to order, only one coupon can be applied to order
		-> caranya dengan memilih salah satu kupon pada halaman My Order dan user juga bisa untuk tidak menggunakan kupon
	- Customer can submit an order and the order is finalized
		-> caranya dengan mengklik button order, namun button order ini muncul ketika minimal terdapat sebuah order pada
			halaman My Order
	- Customer can only pay via bank transfer
		-> caranya sebelum mengklik order pada halaman My Order, user memilih salah satu pembayaran via transfer
	- When placing order the following data is required: name, phone number, email, address
		-> ketika user mengklik order, user akan diarahkan ke halaman pengisian form untuk mengisi data nama, nomor hp,
			email dan alamat
	- When an order is submitted, the quantity for ordered product will be reduced based on the quantity.
		-> ketika form tersebut disubmit maka otomatis total product yang diorder berkurang dapat dilihat pada halaman Products
	- When an order is submitted, the quantity of the coupon will be reduced based on the applied coupon
		-> ketik form tersebut disubmit maka otomatis total coupon yang digunakan berkurang dapat dilihat pada halaman My Coupon
	- An order is successfully submitted if fulfills all of the following condition:
		- Applied coupon is valid
			-> terdapat pengecekan range date sebelum melakukan submit. jika kupon tidak bisa digunakan akan diarahkan ke
				halaman My Order kembali
		- All ordered products is available.
			-> sudah dihandle ketika user melakukan order, sebab pada halaman Products user hanya bisa melakukan order dengan
				maksimal kuantitas sebanyak stock yang available
	- After an order is submitted, customer will be required to submit payment proof
		-> setelah proses order berhasil, user akan diarahkan ke halaman My Transaction dimana user harus memasukkan nomor rekening
			yang digunakan untuk melakukan pembayaran via transfer
	- After an order is submitted, the order is accessible to admin and ready to be processed
		-> setelah user memasukkan rekening maka akan baru muncul data tersebut pada halaman Admin
	- Admin can view order detail
		-> admin dapat melihat detail dari order customer pada halaman Admin
	- Admin can verify the validity of order data: customer name, phone, email, address, payment proof
		- Given an order is valid, then Admin will prepare the ordered items for shipment
			-> admin mengecek data apakah valid, jika valid maka admin akan diberi daftar shipping untuk dipilih
		- Given and order is invalid, then Admin can cancel the order
			-> admin mengecek data apakah valid, jika tidak valid maka admin dapat mengcancel order tersebut dan status cancel akan
				muncul pada halaman My Transaction user
	- After an order ready for shipment, Admin ship process ordered items via logistic partner
		-> setelah admin melakukan validasi data, admin akan memilih shipping yang digunakan untuk mengantarkan barang tersebut, 
	- After shipping the ordered items via logistic partner, Admin will mark the order as shipped and update the order with Shipping ID
		-> kemudian akan muncul nama shipping di halaman My Transaction user dan di halaman Admin
	- Customer can check the order status for the submitted order
		-> user dapat mengecek status order tersebut pada halaman My Transaction pada kolom status
	- Customer can check the shipment status for the submitted order using Shipping ID
		-> ketika barang order user sampai, user dapat memberikan informasi memalui button konfirmasi yang ada di kolom status