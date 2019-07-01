<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Особиста інформація</div>

                    <div class="card-body">
                        <el-form ref="form" status-icon :model="form" :rules="rules" label-position="top">
                            <el-form-item label="Ім'я" prop="fname">
                                <el-input v-model="form.fname" placeholder="Іван"></el-input>
                            </el-form-item>
                            <el-form-item label="Прізвище" prop="lname">
                                <el-input v-model="form.lname" placeholder="Іванов"></el-input>
                            </el-form-item>
                            <el-form-item label="Номер телефону"  prop="phone">
                                <el-input v-model.number="form.phone">
                                    <template slot="prepend">+380</template>
                                </el-input>
                            </el-form-item>
                            <el-form-item label="Електронна пошта"  prop="email">
                                <el-input v-model="form.email" placeholder="i.ivanov@gmail.com"></el-input>
                            </el-form-item>
                        </el-form>
                    </div>
                    <div class="card-footer">
                        <el-button type="success" @click="submitForm">Відправити</el-button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name:"ExampleComponent",
        data(){
            var checkPhone =(rule, value, callback) => {
                 if (!value) {
                    return callback(new Error('Будь ласка введіть номер телефону'));
                } else if (!Number.isInteger(value)) {
                    callback(new Error('Будь ласка введіть тільки цифри'));
                } else {
                    if (value.toString().length > 9) {
                        callback(new Error('Довжина номера не має бути більша ніж 9 цифр'));
                    } else if (value.toString().length < 9) {
                        callback(new Error('Довжина номера не має бути менша ніж 9 цифр'));
                    } else {
                        callback();
                }
          }
            };
            return{
               form:{
                   fname:"",
                   lname:"",
                   phone:"",
                   email:"",
               },
                rules: {
                    fname: [
                       { required: true, message: "Будь ласка введіть ім'я", trigger: 'blur' }
                    ],
                    lname: [
                        { required: true, message: "Будь ласка введіть прізвище", trigger: 'blur' }
                    ],
                    phone: [
                        { validator: checkPhone, required: true, trigger: ['blur', 'change']}
                    ],
                    email: [
                        { required: true, message: 'Будь ласка введіть емейл', trigger: 'blur' },
                        { type: 'email', message: 'Будь ласка введіть корректний емейл', trigger: ['blur', 'change'] }
                    ]
                }
             }
        },
        methods: {
            submitForm(){
                 this.$refs['form'].validate((valid) => {
                    if (valid) {
                        axios.post('/send',{
                            fname:this.form.fname,
                            lname:this.form.lname,
                            phone:this.form.phone,
                            email:this.form.email
                        }).then(response =>{
                            if(response.data.success){
                                 this.$message({
                                    message: 'Запит обробленно успішно',
                                    type: 'success'
                                });
                            } else if(response.data.error){
                                this.$message.error('Сталася помилка');
                            }
                        }).catch(e=>{
                            console.log(e);
                        });
                    } else {
                        return false;
                    }
                });
            }
        }
    }
</script>
