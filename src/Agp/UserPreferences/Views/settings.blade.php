{{-- Tabpane --}}
<div class="tab-pane fade pt-3 pr-5 mr-n5" id="kt_quick_panel_settings" role="tabpanel">
    @php
        if (!isset($preferencias))
            $preferencias = new Agp\UserPreferences\UserPreferences(json_decode(auth()->user()->usuarioPreferencias->get(0)->valor,true));
    @endphp

    @isset($preferencias)
        <form class="form">
            @foreach($preferencias->getPreferencias() as $preferencia)
                {{-- Section --}}
                <div>
                    <div class="form-group mb-0 row">
                        <h5 class="col-8 font-weight-bold mb-3">{{ $preferencia->getTitle() }}</h5>
                        <div class="col-4 text-right">
                        <span class="switch switch-success switch-sm">
                            <label>
                                <input type="checkbox"
                                       {{ $preferencia->isActive()?'checked="checked"':'' }} name="{{ $preferencia->getId() }}"
                                       onchange="make(this)"/>
                                <span></span>
                            </label>
                        </span>
                        </div>
                    </div>
                    @foreach($preferencia->getPreferencias() as $preferencia_)
                        <div class="form-group mb-2 row">
                            <label class="col-8 col-form-label">{{ $preferencia_->getTitle() }}:</label>
                            <div class="col-4 text-right">
                            <span class="switch switch-success switch-sm">
                                <label>
                                    <input type="checkbox"
                                           {{ $preferencia_->isActive()?'checked="checked"':'' }} name="{{ $preferencia_->getId() }}"/>
                                    <span></span>
                                </label>
                            </span>
                            </div>
                        </div>
                        @foreach($preferencia_->getPreferencias() as $preferencia__)
                            @if($preferencia__->getTitle() != '')
                                <div class="form-group mb-1 row">
                                    <label class="col-8 text-muted">{{ $preferencia__->getTitle() }}:</label>
                                    <div class="col-4 text-right">
                                <span class="switch switch-success switch-sm">
                                    <label>
                                        <input type="checkbox"
                                               {{ $preferencia__->isActive()?'checked="checked"':'' }} name="{{ $preferencia__->getId() }}"/>
                                        <span></span>
                                    </label>
                                </span>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @endforeach
                </div>
                <div class="separator separator-dashed my-6"></div>
            @endforeach
        </form>
        <script>
            var make = function (el) {
                $('body').addClass('ajax-loading');
                $.get($(el).data('url'), function (data) {
                    var id = $(el).data('value');
                    if (id == "#all") {
                        $("#notifytitle").html("Notificações (0)");
                        $("#list").html(`<a href="#" class="navi-item"><div class="navi-link rounded"><div class="symbol symbol-50 mr-3">
<div class="symbol-label">
{{Metronic::getSVG('media/svg/icons/Navigation/Double-check.svg', 'svg-icon svg-icon-2x svg-icon-success')}}
                        </div></div><div class="navi-text"><div class="font-weight-bold font-size-lg">Nenhuma notificação</div>
                        <div class="text-muted">no momento!</div></div></div></a>`);
                    } else
                        $(id).remove();
                    $('body').removeClass('ajax-loading');
                }).fail(function () {
                    $('body').removeClass('ajax-loading');
                });
            }
        </script>
    @endisset
</div>
