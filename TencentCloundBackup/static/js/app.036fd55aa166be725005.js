webpackJsonp([1],{GdCP:function(t,e){},NHnr:function(t,e,n){"use strict";Object.defineProperty(e,"__esModule",{value:!0});var i=n("MVMM"),a={render:function(){var t=this.$createElement,e=this._self._c||t;return e("div",{attrs:{id:"app"}},[e("router-view")],1)},staticRenderFns:[]};var o=n("vSla")({name:"App"},a,!1,function(t){n("GdCP")},null,null).exports,r=n("zO6J"),l=n("aozt"),s=n.n(l),c={name:"getActivateCode",data:function(){return{list:[]}},created:function(){var t=this;s.a.get("http://111.230.148.202/ActivateCode/Register_List.php").then(function(e){t.list=e.data})},methods:{}},u={render:function(){var t=this,e=t.$createElement,i=t._self._c||e;return i("div",{attrs:{id:"getActivateCode"}},[i("img",{staticClass:"loginPic",attrs:{src:n("Y2aH")}}),t._v(" "),t._m(0),t._v(" "),i("el-table",{staticStyle:{width:"80%","margin-left":"10vw","margin-top":"3vh",opacity:"0.8",color:"black"},attrs:{data:t.list,stripe:"","highlight-current-row":""}},[i("el-table-column",{attrs:{type:"index"}}),t._v(" "),i("el-table-column",{attrs:{prop:"Name",label:"姓名"}}),t._v(" "),i("el-table-column",{attrs:{prop:"Mail",label:"邮箱"}}),t._v(" "),i("el-table-column",{attrs:{prop:"Reason",label:"理由"}}),t._v(" "),i("el-table-column",{attrs:{prop:"DeviceCode",label:"设备码"}}),t._v(" "),i("el-table-column",{attrs:{prop:"ActivateCode",label:"激活码"}})],1)],1)},staticRenderFns:[function(){var t=this.$createElement,e=this._self._c||t;return e("div",[e("div",{attrs:{id:"vims"}},[this._v("IP视频交换矩阵激活码列表")]),this._v(" "),e("div",{attrs:{id:"vims2"}},[this._v("VIMS-COORDINATOR")])])}]};var m=n("vSla")(c,u,!1,function(t){n("vcFo")},null,null).exports,f={name:"getActivateCode",data:function(){return{form:{device:"",mail:"",user:"",reason:""}}},methods:{onSubmit:function(){var t=n("6iV/"),e=this;s.a.post("http://111.230.148.202/ActivateCode/Get_Activate_Code.php",t.stringify({Device_Feature_Code:this.form.device,Mail:this.form.mail,Name:this.form.user,Reason:this.form.reason})).then(function(t){!1===t.data.Success?e.$notify.error({title:"失败",message:t.data.Message.content}):e.$notify.success({title:"成功",message:t.data.Message.content})}).catch(function(t){console.log(t)})}}},d={render:function(){var t=this,e=t.$createElement,i=t._self._c||e;return i("div",{attrs:{id:"getActivateCode"}},[i("img",{staticClass:"loginPic",attrs:{src:n("Y2aH")}}),t._v(" "),t._m(0),t._v(" "),i("div",{staticClass:"loginCard"},[i("div",{staticClass:"transPic"}),t._v(" "),i("el-form",{ref:"form",attrs:{model:t.form,"label-width":"80px"}},[i("el-form-item",{staticStyle:{"font-weight":"bold"},attrs:{id:"device",label:"设备码:"},nativeOn:{keyup:function(e){return"button"in e||!t._k(e.keyCode,"enter",13,e.key,"Enter")?t.onSubmit(e):null}}},[i("el-input",{attrs:{autoComplete:"off"},model:{value:t.form.device,callback:function(e){t.$set(t.form,"device",e)},expression:"form.device"}})],1),t._v(" "),i("el-form-item",{staticStyle:{"font-weight":"bold"},attrs:{id:"mail",label:"邮箱:"},nativeOn:{keyup:function(e){return"button"in e||!t._k(e.keyCode,"enter",13,e.key,"Enter")?t.onSubmit(e):null}}},[i("el-input",{attrs:{autoComplete:"off"},model:{value:t.form.mail,callback:function(e){t.$set(t.form,"mail",e)},expression:"form.mail"}})],1),t._v(" "),i("el-form-item",{staticStyle:{"font-weight":"bold"},attrs:{id:"user",label:"姓名:"},nativeOn:{keyup:function(e){return"button"in e||!t._k(e.keyCode,"enter",13,e.key,"Enter")?t.onSubmit(e):null}}},[i("el-input",{attrs:{autoComplete:"off"},model:{value:t.form.user,callback:function(e){t.$set(t.form,"user",e)},expression:"form.user"}})],1),t._v(" "),i("el-form-item",{staticStyle:{"font-weight":"bold"},attrs:{id:"reason",label:"理由:"},nativeOn:{keyup:function(e){return"button"in e||!t._k(e.keyCode,"enter",13,e.key,"Enter")?t.onSubmit(e):null}}},[i("el-input",{attrs:{type:"textarea",rows:2,autoComplete:"off"},model:{value:t.form.reason,callback:function(e){t.$set(t.form,"reason",e)},expression:"form.reason"}})],1),t._v(" "),i("el-form-item",{attrs:{id:"loginBtn"}},[i("el-button",{attrs:{type:"primary"},on:{click:function(e){t.onSubmit()}}},[t._v("提  交")])],1)],1)],1)])},staticRenderFns:[function(){var t=this.$createElement,e=this._self._c||t;return e("div",[e("div",{attrs:{id:"vims"}},[this._v("IP视频交换矩阵激活平台")]),this._v(" "),e("div",{attrs:{id:"vims2"}},[this._v("VIMS-COORDINATOR")])])}]};var v=n("vSla")(f,d,!1,function(t){n("baT6")},null,null).exports;i.default.use(r.a);var p=new r.a({routes:[{path:"/",name:"getActivateCode",component:v},{path:"/getList",name:"registerList",component:m}]}),_=n("uNf3"),h=n.n(_);n("UhgQ");i.default.use(h.a),i.default.use(s.a),i.default.config.productionTip=!1,new i.default({el:"#app",router:p,components:{App:o},template:"<App/>"})},UhgQ:function(t,e){},Y2aH:function(t,e,n){t.exports=n.p+"static/img/login.5293795.jpg"},baT6:function(t,e){},vcFo:function(t,e){}},["NHnr"]);
//# sourceMappingURL=app.036fd55aa166be725005.js.map