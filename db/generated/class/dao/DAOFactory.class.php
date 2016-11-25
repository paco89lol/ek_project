<?php

/**
 * DAOFactory
 * @author: http://phpdao.com
 * @date: ${date}
 */
class DAOFactory{
	
	/**
	 * @return AccountDAO
	 */
	public static function getAccountDAO(){
		return new AccountMySqlExtDAO();
	}

	/**
	 * @return AuthorDAO
	 */
	public static function getAuthorDAO(){
		return new AuthorMySqlExtDAO();
	}

	/**
	 * @return CategoryDAO
	 */
	public static function getCategoryDAO(){
		return new CategoryMySqlExtDAO();
	}

	/**
	 * @return CommentDAO
	 */
	public static function getCommentDAO(){
		return new CommentMySqlExtDAO();
	}

	/**
	 * @return DocumentDAO
	 */
	public static function getDocumentDAO(){
		return new DocumentMySqlExtDAO();
	}

	/**
	 * @return GoodBadDAO
	 */
	public static function getGoodBadDAO(){
		return new GoodBadMySqlExtDAO();
	}

	/**
	 * @return GroupDocumentDAO
	 */
	public static function getGroupDocumentDAO(){
		return new GroupDocumentMySqlExtDAO();
	}

	/**
	 * @return GroupMemberDAO
	 */
	public static function getGroupMemberDAO(){
		return new GroupMemberMySqlExtDAO();
	}

	/**
	 * @return GroupsDAO
	 */
	public static function getGroupsDAO(){
		return new GroupsMySqlExtDAO();
	}

	/**
	 * @return InnerCommentDAO
	 */
	public static function getInnerCommentDAO(){
		return new InnerCommentMySqlExtDAO();
	}


}
?>