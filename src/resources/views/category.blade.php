@extends('layouts.app')

@section('css')

@endsection

@section('content')
<div class="category">
    <div class="category__inner">
        <div class="category__title">
            <h2 class="category__title-logo">category</h2>
        </div>
    </div>

    <div class="form">
        <form action="/categories/add" method="post" class="add-form">
            @csrf
            <div class="add-form__item">
                <input type="text" name="content" value="{{ old('content') }}" class="add-form__item-input">
            </div>
            <div class="add-form__button">
                <button type="submit" class="add-form__button-submit">作成</button>
            </div>
        </form>
    </div>

    <div class="categories-table">
        <table class="categories-table__inner">
            <tr class="categories-table__row">
                <th class="categories-table__header">
                    <span class="categories-table__span">id</span>
                    <span class="categories-table__span">content</span>
                </th>
            </tr>
            @foreach($categories as $category)
            <tr class="categories-table__row">
                <td class="categories-table__items">
                    <p class="categories-table__item-p">{{ $category['id'] }}</p>
                    <p class="categories-table__item-p">{{ $category['content'] }}</p>
                </td>
                <td>
                    <div class="modal">
                        <button class="open" popovertarget="change" popovertargetaction="show">変更する</button>
                        <div id="change" popover>
                            <form action="/categories/update" method="post" class="update-form">
                                @method('patch')
                                @csrf
                                <div class="update-form__logo">
                                    <span class="update-form__logo-span">このcontentを本当に更新しますか
                                    </span>
                                    <p class="update-form__logo-p">id = {{ $category['id'] }}</p>
                                    <p class="update-form__logo-p">content = 
                                        <input type="text" name="content" value="{{ old('content') }}">
                                        <input type="hidden" name="id" value="{{ $category['id'] }}">
                                    </p>
                                </div>
                                <div class="update-form__button">
                                    <input type="hidden" name="id" value="">
                                    <button type="submit" class="change" popovertarget="change" popovertargetaction="hidden">更新</button>
                                </div>
                            </form>
                            <div class="close-button">
                                <button class="close" popovertarget="change" popovertargetaction="hidden">×</button>
                            </div>
                        </div>
                    </div>
                </td>
                <td>
                    <div class="modal">
                        <button class="open" popovertarget="delete" popovertargetaction="show">削除する</button>
                        <div id="delete" popover>
                            <form action="/categories/delete" method="post" class="delete-form">
                                @method('delete')
                                @csrf
                                <div class="delete-form__logo">
                                    <span class="delete-form__logo-span">このcontentを本当に削除しますか</span>
                                    <p class="delete-form__logo-p">id = {{ $category['id'] }}</p>
                                    <p class="delete-form__logo-p">content = {{ $category['content'] }}</p>
                                </div>
                                <div class="delete-form__button">
                                    <input type="hidden" name="id" value="{{ $category['id'] }}">
                                    <button type="submit" class="delete" popovertarget="delete" popovertargetaction="hidden">削除</button>
                                </div>
                            </form>
                            <div class="close-button">
                                <button class="close" popovertarget="delete" popovertargetaction="hidden">×</button>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>

@endsection