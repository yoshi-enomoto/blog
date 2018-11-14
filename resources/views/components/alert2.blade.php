<div class="alert alert-danger">
    {{ $slot }}
    <p style="color: orange;">
    上記にはindexから渡される『@~@』の範囲箇所<br>
    受け取りは&#123;&#123; $slot &#125;&#125;でしている。
    {{-- {{ $slot }}をそのまま記述するとindexから値を引き取ってしまう為、特殊記号で表記--}}
    </p>
</div>
