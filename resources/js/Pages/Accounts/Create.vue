<template>
    <div>
        <div class="container-box">
            <div class="page-title">Add Account</div>
            <div class="flex mt-6 items-center">
                <div class="relative w-1/5 mt-2">
                    <TextInput
                        style="width:253px"
                        id="title"
                        label="Title*"
                        placeholder="Title"
                        class="mr-6"
                        v-model="form.title"
                        tabindex="1"
                        maxLength="31"
                        @keyup="checkLength($event,'title',30)"
                    />
                    <p class="absolute" style="color:red" id="title_error"></p>
                </div>
                <div class="w-1/5 mr-6 mt-2">
                    <SelectOption
                        style="width:285px"
                        label="Group*"
                        placeholder="Select Group"
                        :options="groups"
                        id="group_id"
                        value_name="id"
                        label_name="title"
                        v-model="form.group_id"
                        tabindex="2"
                    />
                </div>
                <div class="w-1/5 mr-6 mt-2">
                    <TextInput
                        style="width:253px"
                        id="debit"
                        label="Debit*"
                        placeholder="Debit"
                        class="mr-6"
                        v-model="form.debit"
                        tabindex="1"
                        maxLength="11"
                        @keypress="$event=>isNumber($event,form.debit)"
                        @keyup="checkLength($event,'debit',10)"
                    />
                    <p class="absolute" style="color:red" id="debit_error"></p>
                </div>
                <div class="w-1/5">
                    <TextInput
                        style="width:253px"
                        id="credit"
                        label="Credit*"
                        placeholder="Credit"
                        class="mr-6"
                        v-model="form.credit"
                        tabindex="1"
                        maxLength="11"
                        @keypress="$event=>isNumber($event,form.credit)"
                        @keyup="checkLength($event,'credit',10)"
                    />
                    <p class="absolute" style="color:red" id="credit_error"></p>
                </div>
            </div>
            <div class="footer mt-8 pb-4 grid grid-cols-5 gap-[30px]">
                <PrimaryButton
                    class="text-white font-bold text-18 px-[21px] py-[18px] bg-[#7059E2] text-center rounded-[8px]"
                    @click="submitForm"
                >
                    Save
                </PrimaryButton>
                <Cancel
                    target="#"
                    class="w-1/5"
                    @click="Inertia.visit(route('accounts.index'))"
                />
            </div>
        </div>
    </div>
</template>

<script setup>
import TextInput from "../../Components/Form/TextInput.vue";
import SelectOption from "../../Components/Form/SelectOption.vue";
import PrimaryButton from "../../Components/PrimaryButton.vue";
import Cancel from "../../Components/Form/Cancel.vue"
import { Inertia } from "@inertiajs/inertia";
import { useForm } from '@inertiajs/inertia-vue3';

const props = defineProps(['groups'])
const form = useForm({
    title: "",
    group_id: "",
    debit: "",
    credit: "",
    isDirty: false
});

const isNumber = (evt, formName) =>{
        evt = (evt) ? evt : window.event;
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if ((charCode < 48 || charCode > 57 || formName.split('.')[1]?.length > 1) && charCode !== 46) {
            evt.preventDefault();;
        } else {
            return true;
        }
    }

const checkLength = (e, fieldName, count) => {
    form.isDirty = true;
    if (e.target.value.length > count) {
        document.getElementById(fieldName).style.border =
            "2px solid red";
        document.getElementById(fieldName + "_error").innerHTML =
            "Maximum "+count+" characters allowed";
    } else {
        document.getElementById(fieldName).style.border = "";
        document.getElementById(fieldName + "_error").innerHTML = "";
    }
}

const isValid = () => {

    var flag = true;

    if(form.title == ""){
        document.getElementById('title').style.border="2px solid red"
        flag = false;
    }else if(form.title.length > 30){
        flag = false
    }
    if(form.debit == ""){
        document.getElementById('debit').style.border="2px solid red"
        flag = false;
    }else if(form.debit.length > 10){
        flag = false;
    }
    if(form.credit == ""){
        document.getElementById('credit').style.border="2px solid red"
        flag = false;
    }else if(form.credit.length > 10){
        flag = false;
    }
    if(form.group_id == ""){
        document.getElementById('group_id').style.border="2px solid red"
        flag = false;
    }
    return flag;

}

const submitForm = () => {
    if(isValid() == false){
        return;
    }
    form.post(route('accounts.store'), {
        onSuccess: () => {
            console.log('form submitted');
        }
    })
};
</script>

<style lang="scss" scoped>
.form-group {
    display: block;
    margin-bottom: 15px;
}

.form-group input {
    padding: 0;
    height: initial;
    width: initial;
    margin-bottom: 0;
    display: none;
    cursor: pointer;
}

.form-group label {
    position: relative;
    cursor: pointer;
}

.form-group label:before {
    content: "";
    -webkit-appearance: none;
    //background-color: transparent;
    border: 2px solid #5d5d60;
    box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05),
        inset 0px -15px 10px -12px rgba(0, 0, 0, 0.05);
    padding: 10px;
    display: inline-block;
    position: relative;
    vertical-align: middle;
    cursor: pointer;
    margin-right: 5px;
}

.form-group input:checked + label:after {
    content: "";
    display: block;
    position: absolute;
    top: 2px;
    left: 9px;
    width: 6px;
    height: 14px;
    border: solid #5d5d60;
    border-width: 0 2px 2px 0;
    transform: rotate(45deg);
}
.form-group input:checked {
    background-color: aqua;
}
</style>
