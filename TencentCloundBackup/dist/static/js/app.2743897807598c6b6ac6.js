webpackJsonp([1],{GdCP:function(t,e){},NHnr:function(t,e,a){"use strict";Object.defineProperty(e,"__esModule",{value:!0});var l=a("MVMM"),i={render:function(){var t=this.$createElement,e=this._self._c||t;return e("div",{attrs:{id:"app"}},[e("router-view")],1)},staticRenderFns:[]};var s=a("vSla")({name:"App"},i,!1,function(t){a("GdCP")},null,null).exports,n=a("zO6J"),o=a("aozt"),r=a.n(o),c={name:"getActivateCode",data:function(){return{list:[]}},created:function(){var t=this;r.a.get("http://111.230.148.202/ActivateCode/Register_List.php").then(function(e){t.list=e.data})},methods:{}},v={render:function(){var t=this,e=t.$createElement,l=t._self._c||e;return l("div",{attrs:{id:"getActivateCode"}},[l("img",{staticClass:"loginPic",attrs:{src:a("Y2aH")}}),t._v(" "),t._m(0),t._v(" "),l("el-table",{staticStyle:{width:"95%","margin-left":"2.5vw","margin-top":"3vh",opacity:"0.8",color:"black"},attrs:{data:t.list,stripe:"","highlight-current-row":"",border:""}},[l("el-table-column",{attrs:{prop:"Index",label:"#",width:"80px"}}),t._v(" "),l("el-table-column",{attrs:{prop:"Name",label:"姓名"}}),t._v(" "),l("el-table-column",{attrs:{prop:"Mail",label:"邮箱"}}),t._v(" "),l("el-table-column",{attrs:{prop:"DeviceCode",label:"设备码"}}),t._v(" "),l("el-table-column",{attrs:{prop:"ActivateCode",label:"激活码"}}),t._v(" "),l("el-table-column",{attrs:{prop:"UsePlace",label:"使用地点"}}),t._v(" "),l("el-table-column",{attrs:{prop:"ActivateUnit",label:"认证单位"}}),t._v(" "),l("el-table-column",{attrs:{prop:"Telephone",label:"联系电话"}}),t._v(" "),l("el-table-column",{attrs:{prop:"EffictiveTime",label:"激活期限"}}),t._v(" "),l("el-table-column",{attrs:{prop:"Reason",label:"备注"}})],1)],1)},staticRenderFns:[function(){var t=this.$createElement,e=this._self._c||t;return e("div",[e("div",{attrs:{id:"vims"}},[this._v("IP视频交换矩阵激活码列表")]),this._v(" "),e("div",{attrs:{id:"vims2"}},[this._v("VIMS-COORDINATOR")])])}]};var p=a("vSla")(c,v,!1,function(t){a("rCPo")},null,null).exports,u={name:"getActivateCode",data:function(){return{validTimeContent:[{label:"100天",value:"100天"},{label:"永久",value:"永久"}],device:"",mail:"",user:"",address:"",unit:"",reason:"",phone:"",validTime:""}},methods:{onSubmit:function(){var t=this;if(""==this.device||""==this.mail||""==this.user||""==this.reason||""==this.address||""==this.unit||""==this.phone||""==this.validTime)t.$notify.error({title:"错误",message:"填写信息不完整"});else if(/^([0-9A-Za-z\-_\.]+)@([0-9a-z]+\.[a-z]{2,3}(\.[a-z]{2})?)$/g.test(this.mail)){var e=a("6iV/");r.a.post("http://111.230.148.202/ActivateCode/Get_Activate_Code.php",e.stringify({Device_Feature_Code:this.device,Mail:this.mail,Name:this.user,Reason:this.reason,UsePlace:this.address,ActivateUnit:this.unit,Telephone:this.phone,EffictiveTime:this.validTime.value})).then(function(e){!1===e.data.Success?t.$notify.error({title:"失败",message:e.data.Message.content}):t.$notify.success({title:"成功",message:e.data.Message.content})}).catch(function(t){console.log(t)})}else t.$notify.error({title:"错误",message:"邮箱格式有误"})}}},d={render:function(){var t=this,e=t.$createElement,l=t._self._c||e;return l("div",{attrs:{id:"getActivateCode"}},[l("img",{staticClass:"loginPic",attrs:{src:a("Y2aH")}}),t._v(" "),t._m(0),t._v(" "),l("div",{staticClass:"loginCard"},[l("div",{staticClass:"transPic"}),t._v(" "),l("div",{staticStyle:{"margin-left":"4vw","margin-top":"-54vh","line-height":"10vh"},attrs:{id:"content"}},[l("el-row",[l("el-col",{attrs:{span:3}},[l("span",{staticStyle:{"font-weight":"bold"}},[t._v("设备码:")])]),t._v(" "),l("el-col",{attrs:{span:8}},[l("el-input",{model:{value:t.device,callback:function(e){t.device=e},expression:"device"}})],1),t._v(" "),l("el-col",{attrs:{span:3}},[l("span",{staticStyle:{"font-weight":"bold"}},[t._v("邮箱:")])]),t._v(" "),l("el-col",{attrs:{span:8}},[l("el-input",{model:{value:t.mail,callback:function(e){t.mail=e},expression:"mail"}})],1)],1),t._v(" "),l("el-row",[l("el-col",{attrs:{span:3}},[l("span",{staticStyle:{"font-weight":"bold"}},[t._v("姓名:")])]),t._v(" "),l("el-col",{attrs:{span:8}},[l("el-input",{model:{value:t.user,callback:function(e){t.user=e},expression:"user"}})],1),t._v(" "),l("el-col",{attrs:{span:3}},[l("span",{staticStyle:{"font-weight":"bold"}},[t._v("联系电话:")])]),t._v(" "),l("el-col",{attrs:{span:8}},[l("el-input",{model:{value:t.phone,callback:function(e){t.phone=e},expression:"phone"}})],1)],1),t._v(" "),l("el-row",[l("el-col",{attrs:{span:3}},[l("span",{staticStyle:{"font-weight":"bold"}},[t._v("使用地点:")])]),t._v(" "),l("el-col",{attrs:{span:8}},[l("el-input",{model:{value:t.address,callback:function(e){t.address=e},expression:"address"}})],1),t._v(" "),l("el-col",{attrs:{span:3}},[l("span",{staticStyle:{"font-weight":"bold"}},[t._v("认证单位:")])]),t._v(" "),l("el-col",{attrs:{span:8}},[l("el-input",{model:{value:t.unit,callback:function(e){t.unit=e},expression:"unit"}})],1)],1),t._v(" "),l("el-row",[l("el-col",{attrs:{span:3}},[l("span",{staticStyle:{"font-weight":"bold"}},[t._v("激活时间:")])]),t._v(" "),l("el-col",{attrs:{span:8}},[l("el-select",{attrs:{"value-key":"value",placeholder:"请选择"},model:{value:t.validTime,callback:function(e){t.validTime=e},expression:"validTime"}},t._l(t.validTimeContent,function(t){return l("el-option",{key:t.value,attrs:{label:t.label,value:t}})}))],1),t._v(" "),l("el-col",{attrs:{span:3}},[l("span",{staticStyle:{"font-weight":"bold"}},[t._v("备注:")])]),t._v(" "),l("el-col",{attrs:{span:8}},[l("el-input",{attrs:{type:"textarea",rows:2},model:{value:t.reason,callback:function(e){t.reason=e},expression:"reason"}})],1)],1)],1),t._v(" "),l("el-button",{staticStyle:{"margin-top":"3vh"},attrs:{type:"primary"},on:{click:function(e){t.onSubmit()}}},[t._v("提  交")])],1)])},staticRenderFns:[function(){var t=this.$createElement,e=this._self._c||t;return e("div",[e("div",{attrs:{id:"vims"}},[this._v("IP视频交换矩阵激活平台")]),this._v(" "),e("div",{attrs:{id:"vims2"}},[this._v("VIMS-COORDINATOR")])])}]};var h=a("vSla")(u,d,!1,function(t){a("Zex2")},null,null).exports;l.default.use(n.a);var m=new n.a({routes:[{path:"/",name:"getActivateCode",component:h},{path:"/getlist",name:"registerList",component:p}]}),_=a("uNf3"),f=a.n(_);a("UhgQ");l.default.use(f.a),l.default.use(r.a),l.default.config.productionTip=!1,new l.default({el:"#app",router:m,components:{App:s},template:"<App/>"})},UhgQ:function(t,e){},Y2aH:function(t,e,a){t.exports=a.p+"static/img/login.5293795.jpg"},Zex2:function(t,e){},rCPo:function(t,e){}},["NHnr"]);
//# sourceMappingURL=app.2743897807598c6b6ac6.js.map