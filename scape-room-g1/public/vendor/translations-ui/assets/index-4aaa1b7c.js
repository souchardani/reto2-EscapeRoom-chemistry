import{_ as F}from"./layout-dashboard.vue_vue_type_script_setup_true_lang-7654bfd2.js";import{_ as B}from"./pagination.vue_vue_type_script_setup_true_lang-a57652c1.js";import{_ as D}from"./icon-plus-1734fb8d.js";import{_ as E}from"./input-native-select.vue_vue_type_script_setup_true_lang-2aa72948.js";import{_ as I}from"./input-text.vue_vue_type_script_setup_true_lang-488e2743.js";import{_ as N}from"./icon-arrow-right-da4bfcdd.js";import{d as L,l as f,E as P,O as T,s as U,o,c as h,h as s,w as i,a as e,t as x,v,e as u,F as g,x as A,Z as K,k as O}from"./app-6e494c7d.js";import{_ as G}from"./flag.vue_vue_type_script_setup_true_lang-0fbe3bde.js";import{l as H}from"./lodash-846b37c1.js";import{_ as R}from"./phrase-item.vue_vue_type_script_setup_true_lang-6cad194a.js";import"./icon-publish-73e612df.js";import"./_plugin-vue_export-helper-c27b6911.js";import"./logo-487e8493.js";import"./use-auth-937202b1.js";import"./transition-c671a28f.js";import"./icon-arrow-left-24128421.js";import"./use-input-size-f1e60ecf.js";import"./icon-pencil-0371ebcb.js";import"./icon-language-179135f3.js";const Z={class:"w-full bg-white shadow"},q={class:"mx-auto flex w-full max-w-7xl items-center justify-between px-6 lg:px-8"},J={class:"flex w-full items-center"},M={class:"flex w-full items-center gap-3 py-4"},Q={class:"h-5 shrink-0"},W={class:"flex items-center space-x-2"},X=["textContent"],Y=["textContent"],ee={class:"mx-auto max-w-7xl px-6 py-10 lg:px-8"},te={class:"w-full divide-y overflow-hidden rounded-md bg-white shadow"},se={class:"flex w-full flex-wrap items-center justify-between gap-4 px-4 py-3 sm:flex-nowrap"},ae={class:"w-full max-w-full md:max-w-sm"},oe={class:"w-full max-w-full md:max-w-sm"},le={class:"w-full shadow-md"},ne={class:"flex h-14 w-full divide-x"},re=e("div",{class:"hidden w-20 items-center justify-center px-4 md:flex"},[e("span",{class:"text-sm font-medium text-gray-400"},"State")],-1),ie=e("div",{class:"grid w-full grid-cols-2 divide-x md:grid-cols-3"},[e("div",{class:"flex w-full items-center justify-start px-4"},[e("span",{class:"text-sm font-medium text-gray-400"},"Key")]),e("div",{class:"hidden w-full items-center justify-start px-4 md:flex"},[e("span",{class:"text-sm font-medium text-gray-400"},"Source")]),e("div",{class:"flex w-full items-center justify-start px-4"},[e("span",{class:"text-sm font-medium text-gray-400"}," Translation ")])],-1),de={class:"grid w-[67px] grid-cols-1 divide-x"},ze=L({__name:"index",props:{phrases:{},translation:{},filter:{}},setup(w){var m,p;const d=w,l=f(((m=d.filter)==null?void 0:m.keyword)||""),n=f(((p=d.filter)==null?void 0:p.status)||""),y=[{label:"Translated",value:"translated"},{label:"Untranslated",value:"untranslated"}];return P([l,n],H.debounce(()=>{T.get(route("ltu.phrases.index",{translation:d.translation.id}),{filter:{keyword:l.value||void 0,status:n.value||void 0}},{preserveState:!0,preserveScroll:!0,only:["phrases"]})},300)),(t,r)=>{const b=K,k=G,c=O,j=N,S=I,V=E,$=D,C=B,z=F,_=U("tooltip");return o(),h(g,null,[s(b,{title:"Phrases"}),s(z,null,{default:i(()=>[e("div",Z,[e("div",q,[e("div",J,[e("div",M,[s(c,{href:t.route("ltu.phrases.index",t.translation.id),class:"flex items-center gap-2 rounded-md border border-transparent bg-gray-50 px-2 py-1 hover:border-blue-400 hover:bg-blue-100"},{default:i(()=>[e("div",Q,[s(k,{"country-code":t.translation.language.code,width:"w-5"},null,8,["country-code"])]),e("div",W,[e("div",{class:"text-sm font-semibold text-gray-600",textContent:x(t.translation.language.name)},null,8,X)])]),_:1},8,["href"]),e("div",{class:"rounded-md border bg-white px-1.5 py-0.5 text-sm text-gray-500",textContent:x(t.translation.language.code)},null,8,Y)])]),v((o(),u(c,{href:t.route("ltu.translation.index"),class:"flex size-10 items-center justify-center rounded-full bg-gray-100 p-1 hover:bg-gray-200"},{default:i(()=>[s(j,{class:"size-6 text-gray-400"})]),_:1},8,["href"])),[[_,"Go back"]])])]),e("div",ee,[e("div",te,[e("div",se,[e("div",ae,[s(S,{modelValue:l.value,"onUpdate:modelValue":r[0]||(r[0]=a=>l.value=a),placeholder:"Search by key or value",size:"md"},null,8,["modelValue"])]),e("div",oe,[s(V,{id:"status",modelValue:n.value,"onUpdate:modelValue":r[1]||(r[1]=a=>n.value=a),size:"md",placeholder:"Filter by status",items:y},null,8,["modelValue"])])]),e("div",le,[e("div",ne,[re,ie,e("div",de,[v((o(),u(c,{href:t.route("ltu.source_translation.add_source_key"),class:"group flex items-center justify-center hover:bg-blue-50"},{default:i(()=>[s($,{class:"size-5 text-gray-400 group-hover:text-blue-600"})]),_:1},8,["href"])),[[_,"Add New Key"]])])])]),(o(!0),h(g,null,A(t.phrases.data,a=>(o(),u(R,{key:a.uuid,phrase:a,translation:t.translation},null,8,["phrase","translation"]))),128)),s(C,{links:t.phrases.links,meta:t.phrases.meta},null,8,["links","meta"])])])]),_:1})],64)}}});export{ze as default};
