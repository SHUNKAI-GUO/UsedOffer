class CreateCarts < ActiveRecord::Migration[5.1]
  def change
    create_table :carts do |t|
      t.string :name
      t.float :price
      t.string :category
      t.string :condition
      t.text :description
      t.string :picture
      t.string :item
      t.belongs_to :user, foreign_key: true

      t.timestamps
    end
  end
end
