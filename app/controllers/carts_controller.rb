class CartsController < ApplicationController
  before_action :set_cart, only: [:show, :edit, :update, :destroy]

  # GET /carts
  # GET /carts.json
  def index
    @carts = current_user.carts
  end

  # GET /carts/1
  # GET /carts/1.json
  def show
    @cart = Cart.find(params[:id])
  end

  # GET /carts/new
  def new
    @cart = Cart.new
  end

  # GET /carts/1/edit
  def edit
  end

  # POST /carts
  # POST /carts.json
  def create
    exist = false
    current_user.carts.each do |c|
      if c.item == cart_params.fetch("item")
       exist = true
       break
      end
    end
    if !exist 
      @cart = current_user.carts.new(cart_params)
    else
      @cart = User.new.carts.new
    end
      if @cart.save
        redirect_to view_cart_path
      else
        redirect_to view_cart_path
      end
  end

  def del
    current_user.carts.destroy_all
    render :index
  end
  
  def clear
    current_user.carts.destroy_all
    render :index
  end

  # PATCH/PUT /carts/1
  # PATCH/PUT /carts/1.json
  def update
    respond_to do |format|
      if @cart.update(cart_params)
        format.html { redirect_to @cart, notice: 'Cart was successfully updated.' }
        format.json { render :show, status: :ok, location: @cart }
      else
        format.html { render :edit }
        format.json { render json: @cart.errors, status: :unprocessable_entity }
      end
    end
  end

  def addToCart
    @item = Item.find(params[:item])
    @cart = Cart.new
    @cart.user = current_user
    @cart.name = "Scooter"
    @carts = Cart.all
    render :index
  end

  def emptyCart
  end

  def display
    @carts = current_user.carts
    if @carts.any?
      render :index
    else
      render :emptyCart
    end
  end

  # DELETE /carts/1
  # DELETE /carts/1.json
  def destroy
    @cart.destroy
    respond_to do |format|
      format.html { redirect_to carts_url, notice: 'Cart was successfully destroyed.' }
      format.json { head :no_content }
    end
  end

  private
    # Use callbacks to share common setup or constraints between actions.
    def set_cart
      @cart = Cart.find(params[:id])
    end

    # Never trust parameters from the scary internet, only allow the white list through.
    def cart_params
      params.permit(:name, :price, :category, :condition, :description, :picture, :item)
    end
end
