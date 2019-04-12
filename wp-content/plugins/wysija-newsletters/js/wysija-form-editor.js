"use strict";function info(e){if(WysijaForm.options.debug!==!1){window.console&&console.log||!function(){for(var e=function(){},t=["assert","clear","count","debug","dir","dirxml","error","exception","group","groupCollapsed","groupEnd","info","log","markTimeline","profile","profileEnd","markTimeline","table","time","timeEnd","timeStamp","trace","warn"],o=t.length,i=window.console={};o--;)i[t[o]]=e}();try{console.log("[INFO] "+e)}catch(t){}}}Object.extend(Prototype.Browser,{ie6:/MSIE (\d+\.\d+);/.test(navigator.userAgent)&&6===Number(RegExp.$1)?!0:!1,ie7:/MSIE (\d+\.\d+);/.test(navigator.userAgent)&&7===Number(RegExp.$1)?!0:!1,ie8:/MSIE (\d+\.\d+);/.test(navigator.userAgent)&&8===Number(RegExp.$1)?!0:!1,ie9:/MSIE (\d+\.\d+);/.test(navigator.userAgent)&&9===Number(RegExp.$1)?!0:!1}),Event.cacheDelegated={},Object.extend(document,function(){function e(e){return s[e]=s[e]||{}}function t(t,o){var i=e(t);return i[o]=i[o]||[]}function o(e,o,i){var n=t(e,o);return n.find(function(e){return e.handler===i})}function i(t,i,n){var s=e(t);if(!s[i])return!1;var a=o(t,i,n);return s[i]=s[i].without(a),a}function n(e,o,i,n){var s,a=t(e,o);return a.pluck("handler").include(i)?!1:(s=function(t){var o=t.findElement(e);o&&i.call(n||o,t,o)},s.handler=i,a.push(s),s)}var s=Event.cacheDelegated;return{delegate:function(e,t){var o=n.apply(null,arguments);return o&&document.observe(t,o),document},stopDelegating:function(o,n){var a=arguments.length;switch(a){case 2:t(o,n).each(function(e){document.stopDelegating(o,n,e.handler)});break;case 1:Object.keys(e(o)).each(function(e){document.stopDelegating(o,e)});break;case 0:Object.keys(s).each(function(e){document.stopDelegating(e)});break;default:var r=i.apply(null,arguments);r&&document.stopObserving(n,r)}return document}}}());var Observable=function(){function e(e,t){return e=e.substring(2),t&&(e=t+":"+e),e.underscore().split("_").join(":")}function t(t){var i=t.prototype,n=i.namespace;return Object.keys(i).grep(/^on/).inject($H(),function(s,a){return"onDomLoaded"===a?s:(s.set(e(a,n),o(i[a],t)),s)})}function o(e,t){return function(o){return e.call(new t(this),o,o.memo)}}function i(e,t){$$(e).each(function(e){new t(e).onDomLoaded()})}return{observe:function(e){if(this.handlers||(this.handlers={}),!this.handlers[e]){var o=this;this.prototype.onDomLoaded&&(document.loaded?i(e,o):document.observe("dom:loaded",i.curry(e,o))),this.handlers[e]=t(o).each(function(t){document.delegate(e,t.key,t.value)})}},stopObserving:function(e){this.handlers&&this.handlers[e]&&(this.handlers[e].each(function(t){document.stopDelegating(e,t.key,t.value)}),delete this.handlers[e])}}}();Object.extend(Droppables,{deactivate:Droppables.deactivate.wrap(function(e,t,o){return t.onLeave&&t.onLeave(o,t.element),e(t)}),activate:Droppables.activate.wrap(function(e,t,o){return t.onEnter&&t.onEnter(o,t.element),e(t)}),show:function(e,t){if(this.drops.length){var o,i=[];this.drops.each(function(o){Droppables.isAffected(e,t,o)&&i.push(o)}),i.length>0&&(o=Droppables.findDeepestChild(i)),this.last_active&&this.last_active!==o&&this.deactivate(this.last_active,t),o&&(Position.within(o.element,e[0],e[1]),o.onHover&&o.onHover(t,o.element,Position.overlap(o.overlap,o.element)),o!==this.last_active&&Droppables.activate(o,t))}},displayArea:function(){this.drops.length&&(WysijaForm.hideBlockControls(),this.drops.each(function(e){e.element.hasClassName("block_placeholder")&&(e.element.resizeHeight(30),e.element.addClassName("active"))}))},hideArea:function(){this.drops.length&&this.drops.each(function(e){e.element.hasClassName("block_placeholder")?(e.element.resizeHeight(0),e.element.removeClassName("active")):e.element.hasClassName("image_placeholder")?(e.element.removeClassName("active"),e.element.up().removeClassName("active")):e.element.hasClassName("text_placeholder")&&e.element.removeClassName("active")})},reset:function(e){this.last_active&&this.deactivate(this.last_active,e)}}),Element.addMethods({resizeHeight:function(e,t,o,i){return new Effect.Morph(e,{style:{height:parseInt(t,10)+"px"},afterUpdate:o,afterFinish:i,duration:.1})},scrollToCenter:function(e,t){var e=$(e),o=Object.extend({duration:.2,offset:-document.viewport.getHeight()/2},t||{});return Effect.ScrollTo(e,o),e}});var WysijaForm={version:"0.4",options:{container:"wysija_form_editor",wrapper:"wysija_form_wrapper",body:"wysija_form_body",toolbar:"wysija_form_toolbar",templates:"wysija_widget_templates",debug:!1,css:"wj_css"},toolbar:{effect:null,x:null,y:null,top:null,left:null},scroll:{top:0,left:0},flags:{doSave:!1},locks:{dragging:!1,selectingColor:!1,showingTools:!1},autoSave:function(){WysijaForm.flags.doSave===!1&&(WysijaForm.flags.doSave=!0)},encodeHtmlValue:function(e){return e.replace(/&/g,"&amp;").replace(/>/g,"&gt;").replace(/</g,"&lt;").replace(/"/g,"&quot;")},stripHtmlValue:function(e){return e.replace(/(<([^>]+)>)/gi,"")},save:function(){var e,t=1,o={},i=$H();i.set("version",WysijaForm.version);var n=$("wysija-form-settings").serialize(!0);void 0!==n.success_message&&n.success_message.length>0&&(n.success_message=WysijaForm.encodeHtmlValue(n.success_message)),i.set("settings",n);var s=$H();return WysijaForm.getBlocks().each(function(i){e=i.block,e.save&&(o=e.save(),null!==o&&(o.position=t,o.type=e.element.readAttribute("wysija_type"),o.field=e.element.readAttribute("wysija_field"),o.name=WysijaForm.encodeHtmlValue(e.element.readAttribute("wysija_name")),s.set("block-"+t,o),t++))}),i.set("body",s),Base64.encode(Object.toJSON(i).gsub('\\"','"').gsub('"[{',"[{").gsub('}]"',"}]"))},init:function(){info("init -> set scroll offsets"),WysijaForm.setScrollOffsets(),info("init -> make droppable"),WysijaForm.makeDroppable(),info("init -> make sortable"),WysijaForm.makeSortable(),info("init -> hide controls"),WysijaForm.hideControls(),info("init -> hide settings"),WysijaForm.hideSettings(),info("init -> init toolbar & settings"),WysijaForm.initToolbar(),WysijaForm.setSettingsPosition(),info("init -> set toolbar position"),WysijaForm.setToolbarPosition(),info("init -> toggle widgets"),WysijaForm.toggleWidgets(),WysijaForm.initExport()},initExport:function(){$("form-export-links").select('a[class="expand-code"]').each(function(e){$(e).stopObserving("click"),$(e).observe("click",function(){$("form-export").select("textarea").invoke("hide"),$("export-"+$(e).readAttribute("title")).show()})}),$("form-export").select("textarea").invoke("hide")},hideExport:function(){$("form-export").hide()},showExport:function(){WysijaForm.initExport(),$("form-export").show()},toggleWidgets:function(){var e=($$('a[wysija_unique="1"]').collect(function(e){return $(e).identify()}),null),t=!1;$$('a[wysija_unique="1"]').invoke("removeClassName","disabled"),WysijaForm.getBlocks().each(function(o){void 0!==o.block&&(e=o.block.element.readAttribute("wysija_field"),1===$$("a#"+e+'[wysija_unique="1"]').length&&($$("a#"+e+'[wysija_unique="1"]')[0].addClassName("disabled"),"list"===e&&(t=!0)))}),$("list-selection")[t===!0?"hide":"show"]()},setBlockPositions:function(e,t){WysijaForm.locks.dragging=!1;var o=1;if(WysijaForm.getBlocks().each(function(e){e.setPosition(o++),void 0!==e.block&&e.block.element.setStyle({zIndex:""})}),void 0!==t){var i=$(t.element.readAttribute("wysija_placeholder")),n=t.element.previous(".block_placeholder");null!==i&&(t.element.insert({before:i}),void 0!==t.element.next()&&t.element.next().hasClassName("wysija_form_block")&&void 0!==n&&t.element.insert({after:n}))}WysijaForm.autoSave()},setScrollOffsets:function(){WysijaForm.scroll=document.viewport.getScrollOffsets()},hideSettings:function(){$(WysijaForm.options.wrapper).select(".wysija_settings").invoke("hide")},setSettingsPosition:function(){var e=document.viewport.getHeight(),t=5;$(WysijaForm.options.wrapper).select(".wysija_settings").each(function(o){var i=o.up(".wysija_form_block").getDimensions(),n=o.up(".wysija_form_block").cumulativeOffset(),s=n.top<=WysijaForm.scroll.top+e?!0:!1,a=5,r=a;if(s){{parseInt(WysijaForm.scroll.top+(e/2-o.getHeight()/2),10),parseInt(n.top-t,10),parseInt(n.top+i.height-t,10)}r=parseInt(i.height/2-o.getHeight()/2,10)}new Effect.Move(o,{x:parseInt(i.width/2-o.getWidth()/2),y:r,mode:"absolute",duration:.2})})},initToolbar:function(){Event.stopObserving("scroll"),Event.observe(window,"scroll",function(){WysijaForm.setScrollOffsets(),WysijaForm.setSettingsPosition()})},initToolbarPosition:function(){null===WysijaForm.toolbar.top&&(WysijaForm.toolbar.top=parseInt($(WysijaForm.options.container).positionedOffset().top)),null===WysijaForm.toolbar.left&&(WysijaForm.toolbar.left=parseInt($(WysijaForm.options.container).positionedOffset().left)),null===WysijaForm.toolbar.x&&(WysijaForm.toolbar.x=parseInt(WysijaForm.toolbar.left+$(WysijaForm.options.container).getDimensions().width+15)),null===WysijaForm.toolbar.y&&(WysijaForm.toolbar.y=parseInt(WysijaForm.toolbar.top))},setToolbarPosition:function(){WysijaForm.initToolbarPosition(),$(WysijaForm.options.toolbar).setStyle({top:WysijaForm.toolbar.y+"px",left:WysijaForm.toolbar.x+"px",opacity:0}).fade({duration:1,from:0,to:1})},updateToolbarPosition:function(){WysijaForm.initToolbarPosition(),null!==WysijaForm.toolbar.effect&&WysijaForm.toolbar.effect.cancel(),WysijaForm.scroll.top>=WysijaForm.toolbar.top-20?(WysijaForm.toolbar.y=parseInt(20+WysijaForm.scroll.top),WysijaForm.toolbar.effect=new Effect.Move(WysijaForm.options.toolbar,{x:WysijaForm.toolbar.x,y:WysijaForm.toolbar.y,mode:"absolute",duration:.2})):$(WysijaForm.options.toolbar).setStyle({left:WysijaForm.toolbar.x+"px",top:WysijaForm.toolbar.top+"px"})},blockDropOptions:{accept:$w("wysija_form_item"),onEnter:function(e,t){$(t).addClassName("hover")},onLeave:function(e,t){$(t).removeClassName("hover")},onDrop:function(e,t){var o={};o.type=e.readAttribute("wysija_type"),o.field=e.readAttribute("wysija_field"),o.name=e.readAttribute("wysija_name"),o.element=e,t.fire("wjfe:item:drop",o),$(t).removeClassName("hover")}},hideControls:function(){try{return WysijaForm.getBlocks().invoke("hideControls")}catch(e){}},hideTools:function(){$$(".wysija_tools").invoke("hide"),WysijaForm.locks.showingTools=!1},instances:{},fields:{},get:function(e,t){void 0===t&&(t="block");var o=e.identify(),i=WysijaForm.instances[o]||new(WysijaForm[t.capitalize().camelize()])(o);return WysijaForm.instances[o]=i,i},makeDroppable:function(){Droppables.add("block_placeholder",WysijaForm.blockDropOptions)},makeSortable:function(){var e=$(WysijaForm.options.body);Sortable.create(e,{tag:"div",only:"wysija_form_block",scroll:window,handle:"handle",constraint:"vertical"}),Draggables.removeObserver(e),Draggables.addObserver({element:e,onStart:WysijaForm.startBlockPositions,onEnd:WysijaForm.setBlockPositions})},hideBlockControls:function(){$$(".wysija_controls").invoke("hide"),this.getBlockElements().invoke("removeClassName","hover")},getBlocks:function(){return WysijaForm.getBlockElements().map(function(e){return WysijaForm.get(e)})},getBlockElements:function(){return $(WysijaForm.options.wrapper).select(".wysija_form_block")},startBlockPositions:function(e,t){t.element.hasClassName("wysija_form_block")&&void 0!==t.element.previous(".block_placeholder")&&t.element.writeAttribute("wysija_placeholder",t.element.previous(".block_placeholder").identify()),WysijaForm.locks.dragging=!0},encodeURIComponent:function(e){var t=new RegExp(/^http[s]?:\/\//),o=t.exec(e);return null===o?encodeURIComponent(e).replace(/[!'()*]/g,escape):1===o.length?encodeURI(e).replace(/[!'()*]/g,escape):void 0}};WysijaForm.DraggableItem=Class.create({initialize:function(e){this.elementType=$(e).readAttribute("wysija_type"),this.element=$(e).down()||$(e),this.clone=this.cloneElement(),this.insert()},STYLES:new Template("position: absolute; top: #{top}px; left: #{left}px;"),cloneElement:function(){var e=this.element.clone(),t=this.element.cumulativeOffset(),o=this.getList(),i=this.STYLES.evaluate({top:t.top-o.scrollTop,left:t.left-o.scrollLeft});return e.setStyle(i),e.addClassName("wysija_form_widget"),e.addClassName(this.elementType),e.innerHTML=this.element.innerHTML,e},getOffset:function(){return this.element.offsetTop-this.getList().scrollTop},getList:function(){return this.element.up("ul")},insert:function(){$$("body")[0].insert(this.clone)},onMousedown:function(e){var t=new Draggable(this.clone,{scroll:window,onStart:function(){Droppables.displayArea(t)},onEnd:function(e){e.destroy(),e.element.remove(),Droppables.hideArea()},starteffect:function(e){new Effect.Opacity(e,{duration:.2,from:e.getOpacity(),to:.7})},endeffect:Prototype.emptyFunction});return t.initDrag(e),t.startDrag(e),t}}),Object.extend(WysijaForm.DraggableItem,Observable).observe('a[class="wysija_form_item"]'),WysijaForm.Block=Class.create({initialize:function(e){return info("block -> init"),this.element=$(e),this.block=new WysijaForm.Widget(this.element),this.block.makeBlockDroppable(),void 0!==this.block.setup&&this.block.setup(),this},getCustomData:function(e){return void 0!==this.element.down(".wysija_options."+e)?(info("got options for "+e),this.element.down(".wysija_options."+e).innerHTML.toQueryParams("&amp;")):(info("no options to get for "+e),null)},getOptions:function(){return this.options},setOptions:function(e){return void 0===e&&(e={}),void 0===this.options&&(this.options=new Hash),this.options=this.options.update(e),this},setPosition:function(e){this.element.writeAttribute("wysija_position",e)},hideControls:function(){this.getControls&&(this.element.removeClassName("hover"),this.getControls().hide())},showControls:function(){if(this.getControls){this.element.addClassName("hover");try{this.getControls().show()}catch(e){}}},makeBlockDroppable:function(){if(this.isBlockDroppableEnabled()===!1){var e=this.getBlockDroppable();Droppables.add(e.identify(),WysijaForm.blockDropOptions),e.addClassName("enabled")}},removeBlockDroppable:function(){if(this.isBlockDroppableEnabled()){var e=this.getBlockDroppable();Droppables.remove(e.identify()),e.removeClassName("enabled")}},isBlockDroppableEnabled:function(){var e=this.getBlockDroppable();return null===e?this.createBlockDroppable().hasClassName("enabled"):e.hasClassName("enabled")},createBlockDroppable:function(){return info("block -> createBlockDroppable"),this.element.insert({before:'<div class="block_placeholder"></div>'}),this.element.previous(".block_placeholder")},getBlockDroppable:function(){return void 0===this.element.previous()||this.element.previous().hasClassName("block_placeholder")===!1?null:this.element.previous()},getControls:function(){return this.element.down(".wysija_controls")},setupControls:function(){return this.controls=this.getControls(),this.controls&&(this.element.observe("mouseover",function(){WysijaForm.locks.dragging!==!0&&WysijaForm.locks.selectingColor!==!0&&WysijaForm.locks.showingTools!==!0&&(this.element.addClassName("hover"),this.showControls(),void 0!==this.element.down(".wysija_settings")&&this.element.down(".wysija_settings").show())}.bind(this)),this.element.observe("mouseout",function(){WysijaForm.locks.dragging!==!0&&WysijaForm.locks.selectingColor!==!0&&(this.hideControls(),void 0!==this.element.down(".wysija_settings")&&this.element.down(".wysija_settings").hide())}.bind(this)),this.element.hasClassName("static")===!1&&(this.removeButton=this.controls.down(".remove")||null,null!==this.removeButton&&this.removeButton.observe("click",function(){this.removeBlock(),this.removeButton.stopObserving("click")}.bind(this)),this.settingsButton=this.element.down(".settings")||null,null!==this.settingsButton&&this.settingsButton.observe("click",function(){this.editSettings()}.bind(this)))),this},setBackgroundColor:function(e){void 0!==e&&this.element.writeAttribute("wysija_bg_color",e);var t=this.element.readAttribute("wysija_bg_color");""===t?this.element.setStyle({backgroundColor:"transparent"}):null!==t&&this.element.setStyle({backgroundColor:"#"+t}),WysijaForm.autoSave()},removeBlock:function(e){info("block -> removeBlock"),delete WysijaForm.instances[this.element.identify()],this.element.blindUp({duration:.2,afterFinish:function(t){void 0!==t.element.next(".wysija_form_block")&&e!==!1&&WysijaForm.get(t.element.next(".wysija_form_block")).block.showControls(),void 0!==t.element.previous(".block_placeholder")&&t.element.previous(".block_placeholder").remove(),t.element.remove(),WysijaForm.setBlockPositions(),WysijaForm.toggleWidgets(),void 0!==e&&"function"==typeof e&&e()}})},setFocus:function(){this.element.scrollToCenter()}}),WysijaForm.Block.create=function(e,t){var o,i=$(WysijaForm.options.body),n=new Template('<div class="wysija_form_block" wysija_type="#{type}" wysija_field="#{field}" wysija_name="#{sanitized_name}">'+$(WysijaForm.options.templates).select('[wysija_type="'+e.type+'"][wysija_field="'+e.field+'"]')[0].innerHTML+"</div>");e.sanitized_name="",void 0!==e.name&&(e.sanitized_name=WysijaForm.encodeHtmlValue(e.name)),"block_placeholder"===t.identify()?(i.insert(n.evaluate(e)),o=i.childElements().last()):(t.insert({before:n.evaluate(e)}),o=t.previous(".wysija_form_block")),WysijaForm.makeSortable(),WysijaForm.setBlockPositions(),WysijaForm.setSettingsPosition(),setTimeout(function(){WysijaForm.toggleWidgets()},1)},document.observe("wjfe:item:drop",function(e){info("create block"),WysijaForm.Block.create(e.memo,e.target),info("hide controls"),WysijaForm.hideBlockControls()}),WysijaForm.Widget=Class.create(WysijaForm.Block,{initialize:function(e){return info("widget -> init"),this.element=$(e),this},setup:function(){info("widget -> setup"),this.setupControls()},save:function(){info("widget -> save");var e={};return this.getParameters(),e.params=this.params,e},getParameters:function(){info("widget -> get parameters"),this.params=$H();var e=this.element.down(".wysija_params");return void 0!==e&&e.select("input").each(function(e){this.params.set(e.name,e.value)}.bind(this)),this},getControls:function(){return this.element.down(".wysija_controls")},callback:function(e){this.element.replace(Base64.decode(e)),WysijaForm.init()},formatParameters:function(){this.getParameters();var e=[];return void 0!==this.params&&this.params.keys().length>0&&(this.params.each(function(t){e.push(t[0]+":"+t[1])}),e=e.join("|")),e},remove:function(){this.removeBlock()},editSettings:function(){var e=encodeURIComponent(this.formatParameters());WysijaPopup.open(this.element.readAttribute("wysija_name"),wysijaAJAX.adminurl+"?page=wysija_config&action=form_widget_settings&name="+WysijaForm.encodeURIComponent(this.element.readAttribute("wysija_name"))+"&type="+this.element.readAttribute("wysija_type")+"&field="+this.element.readAttribute("wysija_field")+"&params="+e,this.callback.bind(this))},getSettings:function(){return this.element.down(".wysija_settings")}}),document.observe("dom:loaded",WysijaForm.init);var WysijaPopup={initialized:!1,opened:!1,locked:!1,title:null,url:null,popupWidth:null,popupHeight:null,onSuccess:null,onCancel:null,setSize:function(e,t){return WysijaPopup.popupWidth=e,WysijaPopup.popupHeight=t,this},formatURI:function(e,t){return-1===e.indexOf("?")?e+"?"+t:e+"&"+t},init:function(){if(WysijaPopup.initialized===!1){info("init popup");var e='<div id="wysija_popup_overlay"></div><div id="wysija_popup"><div id="wysija_popup_title"><h3></h3><a id="wysija_popup_close" href="javascript:;"></a></div><div id="wysija_popup_content" class="clearfix"><iframe id="wysija_popup_iframe" marginheight="0" marginwidth="0" frameborder="0"></iframe></div></div>';$$("body")[0].insert(e),$("wysija_popup").setStyle({visibility:"hidden"}),WysijaPopup.hideLoading(),WysijaPopup.hideOverlay(),$("wysija_popup_close").observe("click",WysijaPopup.cancel),$("wysija_popup_overlay").observe("click",function(e){"wysija_popup_overlay"===e.target.id&&WysijaPopup.cancel()}),WysijaPopup.initialized=!0,$("wysija_popup_iframe").observe("load",function(){null!==$(this).readAttribute("src")&&setTimeout(function(){WysijaPopup.opened=!0,WysijaPopup.setDimensions(),WysijaPopup.hideLoading(),WysijaPopup.showOverlay(),setTimeout(function(){$("wysija_popup").setStyle({visibility:"visible"})},1)},0)})}},lock:function(){WysijaPopup.locked=!0},unlock:function(){WysijaPopup.locked=!1},isLocked:function(){return WysijaPopup.locked},setPosition:function(){if(WysijaPopup.init(),WysijaPopup.opened!==!1){var e=$("wysija_popup").getDimensions(),t=document.viewport.getDimensions(),o=parseInt(WysijaForm.scroll.top+t.height/2-e.height/2-15,10),i=parseInt(WysijaForm.scroll.left+t.width/2-e.width/2,10);o<WysijaForm.scroll.top&&(o=parseInt(WysijaForm.scroll.top,10)),i<WysijaForm.scroll.left&&(i=parseInt(WysijaForm.scroll.left,10)),$("wysija_popup").setStyle({top:o+"px",left:i+"px"})}},setDimensions:function(){if(WysijaPopup.opened!==!1){var e=$("wysija_popup_iframe");if(null!==e){e.doc=null,e.contentDocument?e.doc=e.contentDocument:e.contentWindow?e.doc=e.contentWindow.document:e.document&&(e.doc=e.document);var t=0,o=0,i=document.viewport.getDimensions();setTimeout(function(){if($("wysija_popup_iframe").writeAttribute("width",null),$("wysija_popup_iframe").writeAttribute("height",null),null===WysijaPopup.popupWidth||null===WysijaPopup.popupHeight){var n=null;n=e.doc.querySelectorAll(".popup_content").length>0?e.doc.querySelectorAll(".popup_content")[0].getBoundingClientRect():e.doc.getElementsByClassName("popup_content")[0].getBoundingClientRect(),o=n.width.ceil(),t=n.bottom.ceil()}else o=WysijaPopup.popupWidth,t=WysijaPopup.popupHeight;t+50>i.height&&(t=i.height-50),$("wysija_popup").setStyle({width:o+14+"px",height:t+14+"px"}),$("wysija_popup_iframe").writeAttribute("width",o+14),$("wysija_popup_iframe").writeAttribute("height",t+14),WysijaPopup.setPosition()},1)}}},loadContent:function(e,t){$("wysija_popup_iframe").writeAttribute("src",t),$("wysija_popup_title").down("h3").update(WysijaForm.encodeHtmlValue(e))},showOverlay:function(){$("wysija_popup_overlay").setStyle({visibility:"visible"})},showLoading:function(){$("wysija_popup_overlay").addClassName("loading")},hideOverlay:function(){$("wysija_popup_overlay").setStyle({visibility:"hidden"})},hideLoading:function(){$("wysija_popup_overlay").removeClassName("loading")},open:function(e,t,o,i){WysijaPopup.init(),WysijaPopup.showLoading(),WysijaPopup.showOverlay(),void 0!==o&&(WysijaPopup.onSuccess=o),void 0!==i&&(WysijaPopup.onCancel=i),WysijaPopup.loadContent(e,t)},success:function(e){null!==WysijaPopup.onSuccess&&WysijaPopup.onSuccess(e),WysijaPopup.close()},cancel:function(e){null!==WysijaPopup.onCancel&&WysijaPopup.onCancel(e),WysijaPopup.close()},close:function(){return WysijaPopup.isLocked()===!0?!1:($("wysija_popup").writeAttribute("style",""),$("wysija_popup").setStyle({visibility:"hidden"}),WysijaPopup.hideLoading(),WysijaPopup.hideOverlay(),$("wysija_popup_iframe").writeAttribute("src",null),WysijaPopup.onSuccess=null,WysijaPopup.onCancel=null,WysijaPopup.popupWidth=null,WysijaPopup.popupHeight=null,WysijaPopup.opened=!1,!1)}};