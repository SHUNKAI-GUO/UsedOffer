class HomeController < ApplicationController
  def index
  end

  def search
    @search_string = params[:search_string]
    @item_list = Item.ransack(name_cont: @search_string)
  end
end
